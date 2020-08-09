<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPinjamBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_pinjam_barang', function (Blueprint $table) {
            $table->integer('id', true);
			$table->integer('id_pinjaman');
			$table->char('id_barang', 10);
			$table->string('sblm_pinjam')->nullable();
			$table->string('stlah_pinjam')->nullable();
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
        Schema::drop('tb_detail_pinjam_barang');
    }
}
