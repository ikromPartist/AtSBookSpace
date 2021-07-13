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
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Softskills',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Hardskills',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Маркетинг',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Менеджмент',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Финансы',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Staff менеджмент',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Продажи и переговоры',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Сервис',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'ИТ',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            Book::insert([
                'image' => 'book' . $faker->numberBetween($min = 1, $max = 10) . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Художественная Литература',
                'code' => $faker->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available' => $faker->boolean(),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        
    }
}
