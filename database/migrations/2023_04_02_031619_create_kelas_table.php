<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->integer('id_kelas',true,true);
            $table->integer('kelas')->unique();
            $table->timestamps();
        });

        DB::table('kelas')->insert(
            array(
                [
                    'kelas' => '1',
                ],
                [
                    'kelas' => '2',
                ],
                [
                    'kelas' => '3',
                ],
                [
                    'kelas' => '4',
                ],
                [
                    'kelas' => '5',
                ],
                [
                    'kelas' => '6',
                ],
                [
                    'kelas' => '7',
                ],
                [
                    'kelas' => '8',
                ],
                [
                    'kelas' => '9',
                ],
                [
                    'kelas' => '10',
                ],
                [
                    'kelas' => '11',
                ],
                [
                    'kelas' => '12',
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
        Schema::dropIfExists('kelas');
    }
}
