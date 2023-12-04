<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanenergiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuanenergi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('kampus',['Kampus A (1) 555 kVA','Kampus A (2) 1110 kVA','Kampus B 3465 kVA']);
            $table->string('tanggal');
            $table->string('totalEnergiListrik');
            $table->string('totalEnergiTerbarukan')->nullable();
            $table->string('ratio')->nullable();
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
        Schema::dropIfExists('pengajuanenergi');
    }
}
