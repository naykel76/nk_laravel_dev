<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsOptionsTables extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->mediumText('question');
            $table->integer('sort_order')->nullable()->default(0);
            //     $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('question_options', function (Blueprint $table) {
            $table->id();
            $table->string('option_text');
            $table->integer('sort_order')->nullable()->default(0);
            $table->integer('points')->nullable()->default(0);
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('question_options');
        Schema::dropIfExists('questions');
    }
}
