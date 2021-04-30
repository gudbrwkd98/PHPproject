<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonFormalEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_formal_education', function (Blueprint $table) {
         $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->unsigned();
            $table->string('trainingProgram', 250);
            $table->string('certificateTitle', 250);
            $table->string('certifyingAgency', 250);
            $table->date('startYear');
             $table->date('endYear');
            $table->biginteger('duration');
            $table->string('file', 250)->nullable();
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
        Schema::dropIfExists('non_formal_education');
    }
}
