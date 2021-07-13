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
            $table->string('image')->nullable()->default('default.jpg');
            $table->string('title');
            $table->string('author');
            $table->integer('pages');
            $table->string('category')->nullable();
            $table->bigInteger('code');
            $table->text('description');
            $table->bigInteger('rating')->nullable();
            $table->bigInteger('comments')->default(0);
            $table->bigInteger('likes')->default(0);
            $table->boolean('available')->default(true);
            $table->date('available_date')->nullable();
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
