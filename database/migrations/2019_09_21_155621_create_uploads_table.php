<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->biginteger('user_id')->unsigned()->unique();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade')->unsigned();                           
            $table->string('application_letter', 250)->nullable();
            $table->string('application_form', 250)->nullable();
            $table->string('resume', 250)->nullable();
            $table->string('cert_of_emp',250)->nullable();
            $table->string('letter_of_recommendation', 250)->nullable();
            $table->string('passport', 250)->nullable();
            $table->string('psa', 200)->nullable();
            $table->string('transcript', 250)->nullable();
            $table->string('nbi', 250)->nullable();
            $table->string('narrative', 250)->nullable();
            $table->string('receipt', 250)->nullable();
            $table->string('others', 250)->nullable();
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
        Schema::dropIfExists('portfolio');
    }
}
