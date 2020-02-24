<?php

use App\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++) {
            $siswa = new Siswa();
            $siswa->name = "Mohammad siswa ".$i;
            if($i <= 5) {
                $siswa->gender = "Laki Laki";
                $siswa->jenjang = "Sekolah Menengah Atas";
            } else {
                $siswa->gender = "Perempuan";
                $siswa->jenjang = "Sekolah Menengah Kebawah";
            }

            if($i % 2 == 0) {
                $siswa->kelas = "10";
                $siswa->jurusan = "RPL";
            } else {
                $siswa->kelas = "11";
                $siswa->jurusan = "MKT";
            }

            $siswa->jenjang = "SMK";

            $siswa->alamat = "Alamat".$i;
            $siswa->save();
        }
    }
}
