<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->level = "Admin";
        $admin->name = "Mohammad Admin";
        $admin->nip = "085645027785";
        $admin->foto = "admin.png";
        $admin->jabatan = "Administrator";
        $admin->gender = "Laki Laki";
        $admin->tgl_lahir = "20/03/20";
        $admin->tmp_lahir = "Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari";
        $admin->ruangan = "Silahkan menuju ruangan utama di ujung sebelah timur";
        $admin->username = "admin";
        $admin->password = Hash::make("admin");
        $admin->api_token = Str::random(60);
        $admin->save();

        for($i = 1; $i <= 3; $i++) {
            $pegawai = new User();
            $pegawai->level = "Pegawai";
            $pegawai->name = "pegawai ".$i;
            $pegawai->nip = "08".$i."645027785";
            $pegawai->foto = "male.png";
            $pegawai->jabatan = "Developer ".$i;
            $pegawai->gender = "Laki Laki";
            $pegawai->tgl_lahir = "20/03/".$i;
            $pegawai->tmp_lahir = "Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari";
            $pegawai->ruangan = "Silahkan menuju ruangan ke ".$i." di ujung sebelah timur";
            $pegawai->username = null;
            $pegawai->password = null;
            $pegawai->api_token = null;
            $pegawai->save();
        }
        for($i = 4; $i <= 6; $i++) {
            $pegawai1 = new User();
            $pegawai1->level = "Pegawai";
            $pegawai1->name = "pegawai ".$i;
            $pegawai->foto = "female.png";
            $pegawai1->nip = "08".$i."645027785";
            $pegawai1->jabatan = "Developer ".$i;
            $pegawai1->gender = "Perempuan";
            $pegawai1->tgl_lahir = "20/03/".$i;
            $pegawai1->tmp_lahir = "Jawa timur, Kabupaten Pasuruan, Kecamatan Purwosari";
            $pegawai1->ruangan = "Silahkan menuju ruangan ke ".$i." di ujung sebelah timur";
            $pegawai1->username = null;
            $pegawai1->password = null;
            $pegawai1->api_token = null;
            $pegawai1->save();
        }
    }
}
