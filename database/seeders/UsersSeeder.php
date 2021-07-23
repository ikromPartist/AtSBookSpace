<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Company;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('ru_RU');

        foreach (range(1, 90) as $v) {
            $img = $faker->numberBetween($min = 1, $max = 10);
            $books = $faker->numberBetween($min = 0, $max = 500);
            $pages = $books * $faker->numberBetween($min = 100, $max = 500);
            $password = 'user';
            $companyBooks =+ $books;
            $companyPages =+ $pages;

            if ($v == 1 || $v == 10 || $v == 20 || $v == 30 || $v == 40 || $v == 50 || $v == 60 || $v == 70 || $v == 80 || $v == 90) {
                $company = $faker->company;
            }
            if ($v == 9 || $v == 19 || $v == 29 || $v == 39 || $v == 49 || $v == 59 || $v == 69 || $v == 79 || $v == 89) {
                $Company = new Company;
                $Company->name = $company;
                $Company->read_books = $companyBooks;
                $Company->read_pages = $companyPages;
                $Company->save();
                $companyBooks = 0;
                $companyPages = 0;
            }
            User::insert([
                'avatar' => 'avatar' . $img . '.jpg',
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'last_name' => $faker->firstName . 'вич',
                'role' => 'user',
                'login' => 'login' . $v,
                'email' => $faker->unique()->email,
                'password' => Hash::make($password),
                'phone_numbers' => '(+992) ' . $faker->numberBetween($min = 900, $max = 999) . '-' . $faker->numberBetween($min = 10, $max = 99) . '-' . $faker->numberBetween($min = 10, $max = 99) . '-' . $faker->numberBetween($min = 10, $max = 99),
                'read_books' => $books,
                'read_pages' => $pages,
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }

        $user = new User;
        $user->name = 'Имя';
        $user->surname = 'Фамилия';
        $user->last_name = 'Отчество';
        $user->role = 'user';
        $user->login = 'user';
        $user->email = 'user@gmail.com';
            $password = 'user';
            $user->password = Hash::make($password);
        $user->phone_numbers = '(+992) 918-13-04-39';
        $user->save();

    }
}
