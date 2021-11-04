<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chapter_id')->nullable();
            $table->string('title');
            $table->string('type')->default('standard');
            $table->string('slug')->unique()->nullable();
            $table->string('message')->nullable();
            $table->longText('description')->nullable();
            $table->longText('body')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('sort_order')->nullable()->default(0);
            $table->string('file_name')->nullable();
            $table->integer('attempts')->nullable();
            $table->integer('pass_rate')->nullable();
            $table->timestamps();
            // $table->dateTime('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
