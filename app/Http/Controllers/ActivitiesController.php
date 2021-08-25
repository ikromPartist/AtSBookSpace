<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index() 
    {
        $currentDate = Carbon::now();

        $activities = Activity::whereDate('start', '>', $currentDate)
                                ->orderBy('start', 'asc')
                                ->paginate(3);

        return view('activities.index', compact('activities'));
    }

    public function single($id)
    {
        $activity = Activity::find($id);

        return view('activities.single', compact('activity'));
    }

    public function participation(Request $request)
    {
        $user = User::find(session('loggedUser'));

        $activity = Activity::find($request->activity);

        foreach ($activity->participants as $participant) {
            if ($participant->id == $user->id) {
                return 'participant';
            }
        }

        $activity->participants()->attach($user->id);

        return 'success';
    }
}
