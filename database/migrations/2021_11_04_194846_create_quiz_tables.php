<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTables extends Migration
{
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->foreignId('media_id')->references('id')->on('media');
            $table->timestamps();
        });

        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->references('id')->on('quiz_questions')->onDelete('cascade');
            $table->string('option_text');
            $table->integer('is_correct')->nullable()->default(0);
            $table->integer('sort_order')->nullable()->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_options');
        Schema::dropIfExists('quiz_questions');
    }
}
