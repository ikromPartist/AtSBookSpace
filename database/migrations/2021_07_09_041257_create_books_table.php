<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->date('taken_date')->nullable();
            $table->date('return_date')->nullable();
            $table->boolean('deadline_renewed')->nullable()->default(false);
            $table->string('img')->default('default.jpg');
            $table->string('img_front')->default('front.jpg');
            $table->string('img_back')->default('back.jpg');
            $table->string('img_side')->default('side.jpg');
            $table->string('title');
            $table->string('author');
            $table->bigInteger('pages');
            $table->integer('rating')->nullable();
            $table->string('category');
            $table->bigInteger('code')->unique();
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
