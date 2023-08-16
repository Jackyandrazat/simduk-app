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
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik');
            $table->foreign('nik')->references('id')->on('wargas');
            $table->string('nama_tamu', 100);
            $table->char('nik_tamu', 16);
            $table->string('keperluan', 100);
            $table->string('lama_bertamu', 100);
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
        Schema::dropIfExists('tamus');
    }
};
