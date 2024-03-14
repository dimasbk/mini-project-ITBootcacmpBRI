<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('id_asisten');
            $table->unsignedBigInteger('id_materi');
            $table->foreign('id_materi')->references('id')->on('materi');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->enum('teaching_role', ['Ketua', 'Tutor', 'Asisten Baris']);
            $table->date('date');
            $table->time('start');
            $table->time('end')->nullable();
            $table->integer('duration')->nullable();
            $table->string('id_code');
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
        Schema::dropIfExists('absensis');
    }
}
