<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        return view('presentation.index');
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
}
