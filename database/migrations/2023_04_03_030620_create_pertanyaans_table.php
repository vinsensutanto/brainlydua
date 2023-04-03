<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->integer('id_pertanyaan',true,true);
            $table->string('pertanyaan');
            $table->enum('status', ['menunggu', 'dijawab','terjawab']);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('restrict')->onUpdate('cascade');
            $table->integer('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
            $table->string('foto')->unsinged()->nullable();
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
        Schema::dropIfExists('pertanyaans');
    }
}
