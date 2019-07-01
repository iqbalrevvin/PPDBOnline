<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('nama_lengkap',191);
            $table->string('jenis_kelamin',10);
            $table->string('NISN',10)->nullable();
            $table->string('NIK',16);
            $table->string('tempat_lahir',100);
            $table->date('tanggal_lahir');
            $table->string('registrasi_akta_lahir',191);
            $table->string('agama',10);
            $table->string('kewarganegaraan',50);
            $table->string('kebutuhan_khusus',50);
            $table->string('alamat',191);
            $table->string('rt',3)->nullable();
            $table->string('rw',3)->nullable();
            $table->string('desa',191)->nullable();
            $table->string('kecamatan',191)->nullable();
            $table->string('kota',191)->nullable();
            $table->string('provinsi',191)->nullable();
            $table->string('kode_pos',5)->nullable();
            $table->string('tempt_tinggal', 50);
            $table->string('moda_transportasi',50);
            $table->string('no_kks',8)->nullable();
            $table->string('anak_ke',2);
            $table->string('penerima_kps',5);
            $table->string('no_kps',14)->nullable();
            $table->string('penerima_kip',5);
            $table->string('no_kip',6)->nullable();
            $table->string('nama_kip',100)->nullable();
            $table->string('alasan_layak_pip')->nullable();
            //LAMPIRAN
            $table->string('lampiran_KK',191)->nullable();
            $table->string('lampiran_KTP_ortu',191)->nullable();
            $table->string('lampiran_akta_lahir',191)->nullable();
            $table->string('lampiran_ijazah_sebelumnya',191)->nullable();
            // DATA AYAH
            $table->string('nama_ayah',191)->nullable();
            $table->string('NIK_ayah',16)->nullable();
            $table->string('tahun_lahir_ayah',4)->nullable();
            $table->string('pendidikan_ayah',50)->nullable();
            $table->string('pekerjaan_ayah',50)->nullable();
            $table->string('penghasilan_ayah',50)->nullable();
            $table->string('berkebutuhan_khusus_ayah',50)->nullable();
            //DATA IBU
            $table->string('nama_ibu',191)->nullable();
            $table->string('NIK_ibu',16)->nullable();
            $table->string('tahun_lahir_ibu',4)->nullable();
            $table->string('pendidikan_ibu',50)->nullable();
            $table->string('pekerjaan_ibu',50)->nullable();
            $table->string('penghasilan_ibu',50)->nullable();
            $table->string('berkebutuhan_khusus_ibu',50)->nullable();

            $table->string('status_pendaftaran',10)->nullable();
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
        Schema::dropIfExists('siswa');
    }
}
