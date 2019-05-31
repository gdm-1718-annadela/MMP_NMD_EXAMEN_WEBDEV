<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_tabel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bedrag')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->string('user_name')->nullable();
            $table->foreign('project_id')->references('id')->on('project_tabel')->onDelete("cascade");
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
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
        Schema::dropIfExists('fund_tabel');
    }
}
