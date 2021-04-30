<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormalEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('formal_education', function (Blueprint $table) {
         $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->unsigned();
            $table->string('schoolLvl', 250);
            $table->string('schoolName', 250);
            $table->string('schoolAddress', 250);
            $table->year('yearGraduated');


           
            $table->string('degree',250)->nullable();
            $table->string('transcript', 250)->nullable();
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
        //
    }
}
