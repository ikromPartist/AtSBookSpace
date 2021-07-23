<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login() 
    {
        return view('auth.login'); 
    }
    public function register() 
    {
        return view('auth.register');
    }
    public function store(Request $request) 
    {
        // validate requests
        $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'last_name' => 'required|min:5',
            'login' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'company' => 'required|min:3',
            'phone_numbers' => 'required|min:9|numeric'
        ]);
        // insert data into database
        $user = new User;
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->last_name = $request->last_name;
        $user->login = $request->login;
        $user->email = $request->email;
            // $password = Str::random(6);
            $password = '12345';
            $user->password = Hash::make($password);
        $user->company = $request->company;
        $user->phone_numbers = $request->phone_numbers;
        $save = $user->save();

        if ($save) {
            return  back()->with('success', 'New User has been successfuly added to database');
        } else {
            return back()->with('failed', 'Something went wrong, try again later');
        }
    }
    public function check(Request $request) 
    {
        // validate requests
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required|min:4'
        ]);
        $user = User::where('login', '=', $request->login)->first();
        
        if (!$user) {
            return back()->with('fail', 'We do not recognize your login address');
        } else {
            // check password
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loggedUser', $user->id);
                return redirect(route('home_index'));
            } else {
                return back()->with('fail', 'Incorrect password');
            }
        }
    }
    public function logout() 
    {
        if (session()->has('loggedUser')) {
            session()->pull('loggedUser');
            return redirect(route('auth.login'));
        }
    } 

}
