<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('book_id');
            $table->timestamp('date');
            $table->string('audience');
            $table->integer('participants_quantity');
            $table->text('description');
            $table->string('presentation');
            $table->boolean('accepted')->default(false);
            $table->boolean('denied')->default(false);
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
        Schema::dropIfExists('presentations');
    }
}
