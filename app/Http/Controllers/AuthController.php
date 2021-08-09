<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        // Validate user's fields
        $request->validate([
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'last_name' => 'required|min:5',
            'login' => 'required|min:3|unique:users',
            'email' => 'required|email|unique:users',
            'company' => 'required|min:3',
            'phone_numbers' => 'required|min:9|numeric'
        ]);
        // Store user
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
        // Show success when user is stored
        if ($save) 
        {
            return  back()->with('success', 'Новый пользователь успешно добавлен в базу данных');
        } 
        // Show fail when user is not stored
        else 
        {
            return back()->with('failed', 'Что-то пошло не так, попробуйте позже');
        }
    }
    
    public function check(Request $request) 
    {
        // Validate user's fields
        $request->validate([
            'login' => 'required|min:3',
            'password' => 'required|min:4'
        ]);
        // Find user by login
        $user = User::where('login', '=', $request->login)->first();
        // Show fail when user is not founded
        if (!$user) 
        {
            return back()->with('fail', 'Мы не узнаем ваш адрес для входа');
        } 
        // Match the passwords
        if (Hash::check($request->password, $user->password)) 
        {
            // Don't allow to enter if user is in blacklist
            if ($user->blacklist) 
            {
                return back()->with('fail', 'Вы заблокированы! Обратитесь в администрацию');
            }
            else 
            {
                $request->session()->put('loggedUser', $user->id);
                return redirect(route('home.index'));
            }  
        } 
        // Show fail when password is not matched
        else {
            return back()->with('fail', 'Неверный пароль');
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
