<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'media' table is created in place of a 'quizzes' table to work with NayKel LMS

        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->foreignId('media_id')->references('id')->on('media');
            $table->timestamps();
        });

        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->references('id')->on('quiz_questions');
            $table->string('option_text');
            $table->boolean('is_correct')->default(false);
            $table->integer('sort_order')->nullable()->default(0);
            //     $table->integer('points')->nullable()->default(0);
            $table->timestamps();
        });

        // Schema::create('questions', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->unsignedBigInteger('media_id');
        //     $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        // });

 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_options');
        Schema::dropIfExists('quiz_questions');
    }
}
