<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAdmOP extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_AdmOP', function (Blueprint $table) {
            $table->integer('id', true);
			$table->char('id_user', 25);
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->char('foto', 50)->nullable();
			$table->enum('role', [1,2])->default(2);
			$table->string('remember_token', 100)->nullable();
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
        Schema::dropIfExists('tb_AdmOP');
    }
}
