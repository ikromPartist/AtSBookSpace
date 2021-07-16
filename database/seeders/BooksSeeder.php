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
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'all',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Soft Skills',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Hard Skills',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Маркетинг',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Менеджмент',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Финансы',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Staff менеджмент',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Продажи и переговоры',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Сервис',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'ИТ',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        foreach (range(1, 20) as $value) {
            $img = $faker->numberBetween($min = 1, $max = 5);
            Book::insert([
                'img' => 'img' . $img . '.jpg',
                'img_front' => 'img_front' . $img . '.jpg',
                'img_side' => 'img_side' . $img . '.jpg',
                'img_back' => 'img_back' . $img . '.jpg',
                'title' => $faker->realText($maxNbChars = 25),
                'author' => $faker->name,
                'pages' => $faker->numberBetween($min = 100, $max = 1000),
                'category' => 'Художественная литература',
                'code' => $faker->unique()->numberBetween($min = 50000, $max = 99999),
                'description' => $faker->realText($maxNbChars = 400),
                'rating' => $faker->numberBetween($min = 1, $max = 5),
                'comments' => $faker->numberBetween($min = 0, $max = 1000),
                'likes' => $faker->numberBetween($min = 0, $max = 500),
                'available_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 years', $timezone = null), 
                'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
                'updated_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null),
            ]);
        }
        
    }
}
