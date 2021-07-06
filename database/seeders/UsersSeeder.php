<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Имя';
        $user->surname = 'Фамилия';
        $user->last_name = 'Отчество';
        $user->login = 'user';
        $user->email = 'user@gmail.com';
            $password = 'user';
            $user->password = Hash::make($password);
        $user->taken_book = false;
        $user->company = 'Имя компании';
        $user->phone_numbers = 918130439;
        $user->save();
    }
}
