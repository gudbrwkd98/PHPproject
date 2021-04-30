<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()


     


    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->unsigned();
            // $table->biginteger('course')->unsigned();
            // $table->foreign('course')
            //         ->references('id')
            //         ->on('courses')
            //         ->onDelete('cascade')->unsigned();
            $table->string('office', 125);
            $table->string('courseCode', 125);
            $table->string('history', 125)->nullable();
            // $table->string('resubmitto', 125);
            $table->string('status', 125);
            $table->string('stage', 125);
            $table->dateTime('datesubmitted');

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
        Schema::dropIfExists('applications');
    }
}
