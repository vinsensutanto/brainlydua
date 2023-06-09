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
            $table->string('pertanyaan','500');
            $table->enum('status', ['menunggu', 'dijawab','terjawab']);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_kategori')->unsigned()->nullable();
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_kelas')->unsigned()->nullable();
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')->onDelete('cascade')->onUpdate('cascade');
            $table->string('foto')->unsinged()->nullable();
            $table->string('kode');
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
