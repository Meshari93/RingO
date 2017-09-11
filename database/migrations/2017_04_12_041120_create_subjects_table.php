<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subjectTitle');
            $table->string('classSubjects');
             $table->integer('passGrade');
            $table->integer('finalGrade');
            $table->timestamps();
        });
        Schema::create('subject_user', function (Blueprint $table) {

             $table->integer('user_id')->unsigned()->index();
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

             $table->integer('subject_id')->unsigned()->index();
             $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');

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
        Schema::drop('subjects');
        Schema::drop('subject_user');

    }
}
