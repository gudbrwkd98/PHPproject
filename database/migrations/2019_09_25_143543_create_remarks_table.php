<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('app_id')->unsigned();
            $table->foreign('app_id')
                    ->references('id')
                    ->on('applications')
                    ->onDelete('cascade')->unsigned();
            $table->string('remarks', 250);
            $table->string('file', 250)->nullable();
            $table->string('office', 250)->nullable();
          
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
        Schema::dropIfExists('remarks');
    }
}
