<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ru_RU');

        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Softskills',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Hardskills',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Маркетинг',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Менеджмент',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Финансы',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Staff менеджмент',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Продажи и переговоры',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Сервис ',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'ИТ',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Художественная Литература',
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTime(), 
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
        
    }
}
