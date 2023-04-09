<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->decimal('rating',2,1);
            $table->string('password');
            $table->string('foto')->unsinged()->nullable();
            $table->enum('pangkat', ['awam','otakers','admin']);
            $table->rememberToken();
            $table->timestamp('username_verified_at')->nullable();
            $table->timestamps();
        });

        
        DB::table('users')->insert(
            array(
                [
                    'username' => 'admin',
                    'email' => 'admin@gmail.com',
                    'rating' => 0,
                    'password' => Hash::make('admin'),
                    'pangkat' => 'admin',
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
        Schema::dropIfExists('users');
    }
}
