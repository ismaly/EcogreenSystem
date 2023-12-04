<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('nim');
            $table->string('nohp');
            $table->enum('pekerjaan',['Dosen','Staff','Mahasiswa']);
            $table->enum('fakultas',['Ilkom','Tarbiyah','Ushuluddin','Saintek', 'Febi', 'Syariah', 'Dakwah', 'Adab', 'Psikologi', 'PascaSarjana', 'Lainnya']);
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->enum('role',['admin','ketua', 'tim', 'civitas'])->default('civitas');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
