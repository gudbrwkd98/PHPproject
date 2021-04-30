<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityInvolvementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_involvements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->unsigned();
            $table->string('title', 250);
            $table->string('venue', 250);
            $table->date('startYear');
            $table->string('organizer');
            $table->biginteger('duration');
             $table->string('what1', 250);
            $table->string('where1', 250);
            $table->string('overview', 1000);
            $table->date('when1', 250);
            $table->date('endYear');
          
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
        Schema::dropIfExists('community_involvements');
    }
}
