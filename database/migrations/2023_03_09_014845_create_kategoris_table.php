<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKategorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->integer('id_kategori',true,true);
            $table->string('kategori', 30)->unique();
            $table->timestamps();
        });

        
        DB::table('kategoris')->insert(
            array(
                [
                    'kategori' => 'Matematika',
                ],
                [
                    'kategori' => 'Bahasa Indonesia',
                ],
                [
                    'kategori' => 'Bahasa Inggris',
                ],
                [
                    'kategori' => 'PPKN',
                ],
                [
                    'kategori' => 'IPS',
                ],
                [
                    'kategori' => 'IPA',
                ],
                [
                    'kategori' => 'Fisika',
                ],
                [
                    'kategori' => 'Kimia',
                ],
                [
                    'kategori' => 'Penjaskes',
                ],
                [
                    'kategori' => 'Sejarah',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategoris');
    }
}
