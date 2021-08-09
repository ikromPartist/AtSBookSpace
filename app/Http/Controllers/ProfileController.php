<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }    

    public function single($id)
    {
        $user = User::find($id);

        
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
}
