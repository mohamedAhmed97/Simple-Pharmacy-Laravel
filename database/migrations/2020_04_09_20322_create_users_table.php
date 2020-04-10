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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', array('male', 'female'));
            $table->string('password');
            $table->string('date_of_birth');
            $table->string('avatar')->nullable();
            $table->BigInteger('mobile_number')->unique();
            $table->foreignId('area_id')->references('id')->on('areas')->onDelete('cascade');
            $table->string('street_name')->nullable();
            $table->tinyInteger('building_number')->nullable();
            $table->tinyInteger('floor_number')->nullable();
            $table->tinyInteger('flat_number')->nullable();  
            $table->integer('is_main')->default(0);
            $table->string('national_id')->unique();
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
