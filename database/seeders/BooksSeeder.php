<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Rating;
use Carbon\Carbon;
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

        foreach (range(1, 220) as $v) {
            switch ($v) {
                case ($v < 20):
                    $cat = 'all';
                    break;

                case ($v < 40):
                    $cat = 'Soft Skills';
                    break;

                case ($v < 60):
                    $cat = 'Hard Skills';
                    break;

                case ($v < 80):
                    $cat = 'Маркетинг';
                    break;

                case ($v < 100):
                    $cat = 'Менеджмент';
                    break;

                case ($v < 120):
                    $cat = 'Финансы';
                    break;

                case ($v < 140):
                    $cat = 'Staff менеджмент';
                    break;

                case ($v < 160):
                    $cat = 'Продажи и переговоры';
                    break;

                case ($v < 180):
                    $cat = 'Сервис';
                    break;

                case ($v < 200):
                    $cat = 'ИТ';
                    break;

                case ($v < 220):
                    $cat = 'Художественная литература';
                    break;

                default:
                    $cat = 'all';
                    break;
            }
            $img = $faker->numberBetween($min = 1, $max = 5);
            $days = $faker->numberBetween($min = 15, $max = 30);
            $day = $faker->numberBetween($min = 15, $max = 30);
            $renew = $days % 2;

            $ratings = Rating::where('book_id', $v)->get();
            $rate = 0;
            $rating =0;
            foreach ($ratings as $r) {
                $rate = $rate + $r->rate;
            }
            if (count($ratings) != 0) {
                $rating = $rate / count($ratings);
            }

            $book = new Book;
            if ($v < 51) {
                $book->user_id = $v;
                $book->taken_date = Carbon::now()->subDays($days);
                $book->return_date = Carbon::now()->addDays($day);
                $book->deadline_renewed = $renew; 
            }
                $book->img = 'img' . $img . '.jpg';
                $book->img_front = 'img_front' . $img . '.jpg';
                $book->img_side = 'img_side' . $img . '.jpg';
                $book->img_back = 'img_back' . $img . '.jpg';
                $book->title = $faker->realText($maxNbChars = 25);
                $book->author = $faker->name;
                $book->pages = $faker->numberBetween($min = 100, $max = 1000);
                $book->rating = $rating;
                $book->category = $cat;
                $book->code = $faker->unique()->numberBetween($min = 50000, $max = 99999);
                $book->description = $faker->realText($maxNbChars = 400);
            if ($v < 51) {
                $book->available_date = Carbon::now()->subDays($day); 
            } else {
                $book->available_date = null; 
            }
                $book->created_at = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
                $book->updated_at = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
                $book->save();

        }
        
    }
}
