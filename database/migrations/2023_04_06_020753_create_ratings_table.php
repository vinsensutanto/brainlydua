<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->integer('id_rating',true,true);
            $table->decimal('rating',2,1);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_pertanyaan')->unsigned()->nullable();
            $table->foreign('id_pertanyaan')->references('id_pertanyaan')->on('pertanyaans')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_jawaban')->unsigned()->nullable();
            $table->foreign('id_jawaban')->references('id_jawaban')->on('jawabans')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ratings');
    }
}
