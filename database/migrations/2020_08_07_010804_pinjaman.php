<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pinjaman', function (Blueprint $table) {
            $table->integer('id', true);
			$table->integer('id_user');
			$table->integer('id_admin')->nullable();
			$table->string('id_barang');
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
        Schema::drop('tb_pinjaman');
    }
}
