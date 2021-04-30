<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->unsigned();
            $table->string('firstName', 25);
            $table->string('middleName', 25)->nullable;
            $table->string('lastName', 25);
            $table->date('bday')->nullable();
            $table->string('phone', 15);
            $table->string('address', 250);
            $table->string('photo', 55)->nullable();
            $table->string('civil_status', 250);
            $table->string('citizenship', 250);
            $table->string('gender', 250);
            $table->string('birth_place', 250);
            $table->string('language', 250);
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
        Schema::dropIfExists('profiles');
    }
}
