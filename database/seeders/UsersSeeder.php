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
        $user->role = 'user';
        $user->login = 'user';
        $user->email = 'user@gmail.com';
            $password = 'user';
            $user->password = Hash::make($password);
        $user->company = 'Имя компании';
        $user->phone_numbers = '+(992) 918-13-04-39';
        $user->save();

        //Create Users
        $avatars = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg', '10.jpg'];
        $names = ['Икром', 'Бобур', 'Даврон', 'Дмитрий', 'Азамат', 'Мaдина', 'Снежанна', 'Амриддин', 'Михаил', 'Парвина'];
        $surnames = ['Рахимов', 'Нуридинов', 'Олегов', 'Камаров', 'Зияев', 'Иброровна', 'Бадоева', 'Холов', 'Сохибназаров', 'Мирославовна'];
        $lastNames = ['Дилшодович', 'Нуридинович', 'Олегович', 'Камарович', 'Зияевич', 'Иброровна', 'Бадоевич', 'Холович', 'Сохибназарович', 'Мирославовна'];
        $logins = ['ikrom', 'bobur', 'miha', 'dima', 'admin', 'aza', 'snejok', 'amrik', 'userf', 'skype'];
        $roles = ['admin', 'user', 'user', 'user', 'user', 'user', 'user', 'user', 'user', 'user'];
        $emails = ['ikromr04@gmail.com', 'boburjon_n@mail.ru', 'misha@mail.ru', 'dima@mail.ru', 'azamat@mail.ru', 'med_2000@mail.ru', 'snejok@mail.ru', 'amriqul@mail.ru', 'superman_sila@mail.ru', 'parvinka99@mail.ru'];

        for ($i=0; $i < count($names); $i++) {
            $user = new User;
            $user->avatar = $avatars[$i];
            $user->name = $names[$i];
            $user->surname = $surnames[$i];
            $user->last_name = $lastNames[$i];
            $user->role = $roles[$i];
            $user->login = $logins[$i];
            $user->email = $emails[$i];
                $password = 'user';
                $user->password = Hash::make($password);
            $user->company = 'Компания Название';
            $user->phone_numbers = '+(992) 918-13-04-39';
            $user->save();
        }

    }
}
