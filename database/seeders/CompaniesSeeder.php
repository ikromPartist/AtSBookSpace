<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;
use Faker\Factory as Faker;

class CompaniesSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      $faker = Faker::create('ru_RU');

      foreach (range(1, 20) as $val) {

            $users = User::withCount('taken_books')->where('company_id', $val)->get();
            $books = 0;
            foreach ($users as $user) {
               $books = $books + $user->taken_books_count;
            }  
            $pages = 0;
            foreach ($users as $user) {
               $pages = $pages + $user->read_pages;
            }  

            Company::insert([
               'name' => $faker->company,
               'read_books' => $books,
               'read_pages' => $pages,
               'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
               'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
      }
      
   }
}
