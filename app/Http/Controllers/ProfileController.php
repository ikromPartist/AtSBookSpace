<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);
        // Find user's position in rating
        $users = User::select('id','read_pages')
                        ->orderBy('read_pages', 'desc')
                        ->get();

        $usersCount = count($users);
        $userPosition = 0;
        for ($i=0; $i < $usersCount; $i++) { 
            if ($users[$i]->id == $user->id)
            {
                $userPosition = $i;
            }
        }
        // Emoji construct
        $userRating = 100 - (($userPosition * 100) / $usersCount);

        $membersCount = User::get()->count();
        return view('profile.index', compact('membersCount', 'userRating', 'userPosition', 'usersCount'));
    }    

    public function single($id)
    {
        $user = User::find($id);

        return view('profile.single', compact('user'));
    }

    public function avatarUpdate(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);
        $file = $request->file('avatar');

        if ($file)
        {
            // Delete previous avatar when exists
            if ($user->avatar != 'default.png')
            {
                $path = public_path('img/users/' . $user->avatar);
                if (file_exists($path))
                {
                    unlink($path);
                }
            }
            // Store new avatar
            $path = public_path('img/users');
            $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($path, $fileName);
            // Update user's avatar
            $user->avatar = $fileName;
            $user->save();
        }

        return redirect()->back();
    }

    public function userinfoUpdate(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);
        // Validate user's fields
        $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'last_name' => 'required|min:5',
            'email' => 'required|email',
            'phone_numbers' => 'required|min:9'
        ]);
        if ($request->login != $user->login)
        {
            $request->validate([
                'login' => 'required|min:3|unique:users',
            ]);
        }        
        // Update user's fields
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone_numbers = $request->phone_numbers;
        $user->login = $request->login;
        $user->save();

        return redirect()->back(); 
    }

    public function passwordUpdate(Request $request)
    {
        $id = session()->get('loggedUser');
        $user = User::find($id);

        if (Hash::check($request->password, $user->password)) {
            if ($request->newpassword == $request->confirmpassword) {
                $user->password = bcrypt($request->newpassword);
                $user->save();
                return 'success';
            }
            return 'newPasswordDoesntMatch';
        }

        return 'passwordNotMatched';
    }

    public function fetchData(Request $request)
    {
        if ($request->ajax())
        {
            $type = $request->get('type');

            if ($type == 'profile')
            {
                $id = session()->get('loggedUser');
                $user = User::find($id);
                // Find user's position in rating
                $users = User::select('id', 'read_pages')
                    ->orderBy('read_pages', 'desc')
                    ->get();

                $usersCount = count($users);
                $userPosition = 0;
                for ($i = 0; $i < $usersCount; $i++) {
                    if ($users[$i]->id == $user->id) {
                        $userPosition = $i;
                    }
                }
                // Emoji construct
                $userRating = 100 - (($userPosition * 100) / $usersCount);

                return view('profile.data.profile', compact('userRating', 'userPosition', 'usersCount'));
            }
            else if ($type == 'members')
            {
                $members = User::orderBy('surname', 'asc')
                                ->paginate(9);

                return view('profile.data.members', compact('members'))->render();
            } 
            else if ($type == 'read_books') 
            {
                return view('profile.data.read_books');
            }
            else if ($type == 'activities')
            {
                return view('profile.data.activities');
            } 
            else if ($type == 'presentation') 
            {
                return view('profile.data.presentation');
            } 
            else if ($type == 'booked_books') 
            {
                return view('profile.data.booked_books');
            } 
            else if ($type == 'liked_books') 
            {
                return view('profile.data.liked_books');
            } 
            else if ($type == 'settings') 
            {
                return view('profile.data.settings');
            }
        }
    }
}
