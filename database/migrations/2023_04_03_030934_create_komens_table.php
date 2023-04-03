<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komens', function (Blueprint $table) {
            $table->integer('id_komen',true,true);
            $table->string('komen');
            $table->integer('id_pertanyaan')->unsigned();
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaans')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('id_jawaban')->unsigned();
            $table->foreign('id_jawaban')->references('id_jawaban')->on('jawabans')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('komens');
    }
}
