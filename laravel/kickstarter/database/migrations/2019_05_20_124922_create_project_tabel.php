<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tabel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('naam');
            $table->string('uitleg');
            $table->integer('credits_doelbedrag');
            $table->integer('credits_gesubsideert')->nullable();
            $table->date('gepubliceerd_tot');
            $table->integer('minimumbedrag')->nullable();
            $table->string('minimumsouvenir')->nullable();
            $table->integer('maximumbedrag')->nullable();
            $table->string('maximumsouvenir')->nullable();
            $table->boolean('kijker')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categorie_tabel')->onDelete('cascade');

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
        Schema::dropIfExists('project_tabel');
    }
}
