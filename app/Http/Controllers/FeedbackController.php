<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function send(Request $request)
    {
        $user = User::find(session('loggedUser'));

        $feedback = new Feedback;
        $feedback->user_id = $user->id;
        $feedback->message = $request->message;
        $feedback->save();

        $notification = new Notification;
        $notification->type = 'feedback';
        $notification->type_id = $feedback->id;
        $notification->save();

        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            $admin->notifications()->attach($notification->id); 
        }

        return 'success';
    }
}
