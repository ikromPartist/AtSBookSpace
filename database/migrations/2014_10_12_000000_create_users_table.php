<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->default('default.jpg');
            $table->string('name');
            $table->string('surname');
            $table->string('last_name');
            $table->string('role')->default('user');
            $table->string('login')->unique();
            $table->string('email');
            $table->string('password');
            $table->string('phone_numbers');
            $table->bigInteger('read_pages')->default(0);
            $table->bigInteger('company_id')->nullable();
            $table->integer('renewed_deadlines')->default(0);
            $table->boolean('blacklist')->default(false);
            $table->integer('blacklist_value')->default(0);
            $table->text('description')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
