<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExam2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
          $table->increments('id');
           $table->string('examTitle');
          $table->text('examDescription');
          $table->string('examDate');
          $table->integer('examMark');
          $table->integer('examClasses')->unsigned()->index();
          $table->foreign('examClasses')->references('id')->on('classes')->onDelete('cascade');
          $table->integer('examSubjects')->unsigned()->index();
          $table->foreign('examSubjects')->references('id')->on('subjects')->onDelete('cascade');
          $table->integer('examAcYear')->unsigned()->index();
          $table->foreign('examAcYear')->references('id')->on('academic_years')->onDelete('cascade');

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
        Schema::drop('exams');
    }
}
