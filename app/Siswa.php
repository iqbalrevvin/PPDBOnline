<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table    = 'Siswa';
    protected $fillable = ['id', 'user_id', 'nama_lengkap', 'jenis_kelamin', 'NISN', 'NIK', 'tempat_lahir', 'tanggal_lahir', 'registrasi_akta_lahir', 'agama', 'kewarganegaraan', 'kebutuhan_khusus', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'kota', 'provinsi', 'kode_pos', 'tempt_tinggal', 'moda_transportasi', 'no_kks', 'anak_ke', 'penerima_kps', 'no_kps', 'penerima_kip', 'no_kip', 'nama_kip', 'alasan_layak_pip', 'nama_ayah', 'NIK_ayah', 'tahun_lahir_ayah', 'pendidikan_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'berkebutuhan_khusus_ayah', 'nama_ibu', 'NIK_ibu', 'tahun_lahir_ibu', 'pendidikan_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'berkebutuhan_khusus_ibu', 'lampiran_KK', 'lampiran_KTP_ortu', 'lampiran_akta_lahir', 'lampiran_ijazah_sebelumnya', 'created_at', 'updated_at'];
}
