<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $current_date = Carbon::now();

        $presentations = Presentation::whereDate('date', '>', $current_date)
                                        ->where('accepted', true)
                                        ->orderBy('date', 'asc')
                                        ->paginate(3);

        return view('presentation.index', compact('presentations'));
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
}
