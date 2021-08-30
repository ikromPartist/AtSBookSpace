<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Notification;
use App\Models\Presentation;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = User::find(session('loggedUser'))
                                ->notifications()
                                ->orderBy('new', 'desc')
                                ->orderBy('created_at', 'desc')
                                ->paginate(20);

        $rank = $notifications->firstItem();

        return view('notifications.index', compact('notifications', 'rank'));
    }

    public function single(Notification $notification)
    {
        $loggedUser = User::find(session('loggedUser'));

        if ($notification->new)
        {
            $notification->new = false;
            $notification->save();
        }

        $type = $notification->type;

        switch ($type) {
            case 'presentation';
            case 'presentation_accepted';
            case 'presentation_denied':
                $presentation = Presentation::find($notification->type_id);
        
                if ($loggedUser->role == 'admin') 
                {
                    return view('admin.presentation.single', compact('presentation'));
                }
                else 
                {
                    return view('presentation.single', compact('presentation'));
                }
                break;
            case 'feedback';
            case 'feedback_answered':
                $feedback = Feedback::find($notification->type_id);
        
                if ($loggedUser->role == 'admin') 
                {
                    return view('admin.notifications.feedback', compact('feedback'));
                } 
                else 
                {
                    return view('notifications.feedback', compact('feedback'));
                }
                break;                
            default:
                # code...
                break;
        }
    }
}
