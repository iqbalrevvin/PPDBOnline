<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpdbDataSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah', function (Blueprint $table) {
            $table->increments('id');
            // $table->enum('jenjang',
            //     ['sd', 'mi', 'smp', 'mts', 'sma', 'ma', 'mak']
            // );
            $table->string('jenjang',10);
            $table->string('npsn',8)->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('logo')->nullable();
            $table->string('rt',3)->nullable();
            $table->string('rw',3)->nullable();
            $table->string('alamat',191)->nullable();
            $table->string('desa',191)->nullable();
            $table->string('kecamatan',191)->nullable();
            $table->string('kota',191)->nullable();
            $table->string('provinsi',191)->nullable();
            $table->string('kode_pos',5)->nullable();
            $table->string('yayasan',100)->nullable();
            $table->string('sk_pendirian_sekolah',191)->nullable();
            $table->date('tanggal_sk_pendirian')->nullable();
            $table->string('sk_izin_operasional',191)->nullable();
            $table->date('tanggal_sk_izin_operasional')->nullable();
            $table->string('email',191)->nullable();
            $table->string('no_telp',14);
            $table->string('facebook',191)->nullable();
            $table->string('instagram',191)->nullable();
            $table->string('twitter',191)->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('maps')->nullable();
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
        Schema::dropIfExists('ppdb_data_sekolah');
    }
}
