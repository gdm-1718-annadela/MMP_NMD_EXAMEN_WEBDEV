<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikel_tabel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titel');
            $table->string('tekst');
            $table->string('image_paht');
            $table->string('excerpt');
            $table->string('slot');
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
        Schema::dropIfExists('artikel_tabel');
    }
}
