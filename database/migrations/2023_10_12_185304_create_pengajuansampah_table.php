<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuansampahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuansampah', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->bigInteger('nim');
            $table->string('nohp');
            $table->enum('pekerjaan',['Dosen','Staff','Mahasiswa']);
            $table->enum('fakultas',['Ilkom','Tarbiyah','Ushuluddin','Saintek', 'Febi', 'Syariah', 'Dakwah', 'Adab', 'Psikologi', 'PascaSarjana', 'Lainnya']);
            $table->enum('jenis_sampah',['Sampah Organik','Sampah Anorganik','Sampah Bahan Berbahaya dan Beracun (B3)','Sampah Kertas','Sampah Residu','lainnya']);
            $table->string('total');
            $table->string('formFile');
            $table->timestamps();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['Diterima', 'Ditolak'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuansampah');
    }
}
