<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRewardTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_tabel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titel');
            $table->string('beschrijving');
            $table->integer('bedrag');
            $table->string('image_path');
            $table->string('image_title');
            $table->string('image_caption');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project_tabel')->onDelete('cascade');
            $table->unsignedBigInteger('history_id');
            $table->foreign('history_id')->references('id')->on('history_tabel')->onDelete('cascade');
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
        Schema::dropIfExists('reward_tabel');
    }
}
