<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('keluarga_id');
            $table->char('nik',16)->unique();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('alamat');
            $table->string('alamat_baru');
            $table->string('status');
            $table->string('status_kk');
            $table->integer('usia');
            $table->string('status_tempat_tngl');
            $table->string('status_kependudukan');
            $table->integer('RW');
            $table->integer('RT');
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
        Schema::dropIfExists('wargas');
    }
};
