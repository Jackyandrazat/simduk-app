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
        Schema::create('meninggals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik');
            $table->foreign('nik')->references('id')->on('wargas');
            $table->date('date_meninggal');
            $table->string('jam', 20);
            $table->string('lokasi_meninggal', 100);
            $table->string('lokasi_pemakaman', 100);
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
        Schema::dropIfExists('meninggals');
    }
};
