<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJawabansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawabans', function (Blueprint $table) {
            $table->integer('id_jawaban',true,true);
            $table->string('jawaban');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('id_pertanyaan')->unsigned();
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaans')->onDelete('restrict')->onUpdate('cascade');
            $table->string('foto')->unsinged()->nullable();
            $table->decimal('rating',2,1);
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
        Schema::dropIfExists('jawabans');
    }
}
