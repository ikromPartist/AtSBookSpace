<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Presentation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now();

        $presentations = Presentation::whereDate('date', '>', $currentDate)
                                        ->where('accepted', true)
                                        ->orderBy('date', 'asc')
                                        ->paginate(3);

        return view('pages.presentation.index', compact('presentations'));
    }

    public function single($id)
    {
        $presentation = Presentation::find($id);

        return view('pages.presentation.single', compact('presentation'));
    }

    public function store(Request $request)
    {
        $id = session()->get('loggedUser');
        // Store presentation
        $file = $request->file('presentation');
        $path = public_path('presentations');
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $fileName);
        // Store presentation
        $presentation = new Presentation;
        $presentation->user_id = $id;
        $presentation->book_id = $request->book;
        $presentation->date = $request->datetime;
        $presentation->audience = $request->audience;
        $presentation->participants_quantity = $request->participants;
        $presentation->description = $request->description;
        $presentation->presentation = $fileName;
        $save = $presentation->save();
        // Make notification for admin 
        $notification = new Notification;
        $notification->type = 'presentation';
        $notification->type_id = $presentation->id;
        $notification->save();

        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) 
        {
            $admin->notifications()->attach($notification->id);
        }
        // Show success when user is stored
        if ($save) {
            return 'success';
        }
        // Show fail when user is not stored
        else {
            return 'failed';
        }
    }

    public function participation(Request $request)
    {
        $user = User::find(session('loggedUser'));

        $presentation = Presentation::find($request->presentation);

        foreach ($presentation->participants as $participant) {
            if ($participant->id == $user->id) 
            {
                return 'participant';
            }
        }

        $presentation->participants()->attach($user->id);

        return 'success';
    }

    public function download(Presentation $presentation)
    {
        $file = public_path() . '/presentations/' . $presentation->presentation;

        $extension = pathinfo($file, PATHINFO_EXTENSION);
        
        $headers = array(
            'Content-Type: application/' . $extension,
        );
        
        return response()->download($file, $presentation->presentation, $headers);
    }

    public function acception(Request $request)
    {
        $presentationId = $request->presentationid;
        $acception = $request->acception;

        $presentation = Presentation::select('id', 'user_id', 'accepted', 'denied')
                                        ->find($presentationId);

        if ($acception == 'accepted') {
            $presentation->accepted = true;
            $presentation->denied = false;
            $presentation->save();

            $notification = new Notification;
            $notification->type = 'presentation_accepted';
            $notification->type_id = $presentation->id;
            $notification->save();

            $userId = $presentation->user->id;
            $user = User::find($userId);
            $user->notifications()->attach($notification->id);

            return back();

        } 
        if ($acception == 'denied')
        {
            $presentation->denied = true;
            $presentation->accepted = false;
            $presentation->save();

            $notification = new Notification;
            $notification->type = 'presentation_denied';
            $notification->type_id = $presentation->id;
            $notification->save();

            $userId = $presentation->user->id;
            $user = User::find($userId);
            $user->notifications()->attach($notification->id);

            return back();
        }

    }
}
