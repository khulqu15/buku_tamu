<?php

use App\Inventaris;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

class InventarisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 3; $i++) {
            $inven = new Inventaris();
            $inven->name = "Inventaris ".$i;
            $inven->description = "Ini adalah inventaris ke ".$i;
            $inven->jumlah = $i."0";
            $inven->status = "Tersedia";
            $inven->foto = "buku1.png";
            $inven->kode_barang = "INAGATA".'-'.strtoupper(Str::random(5));
            $inven->save();
        }
        for($i = 4; $i <= 6; $i++) {
            $inven = new Inventaris();
            $inven->name = "Inventaris ".$i;
            $inven->description = "Ini adalah inventaris ke ".$i;
            $inven->jumlah = $i."0";
            $inven->status = "Tersedia";
            $inven->foto = "buku2.jpeg";
            $inven->kode_barang = "INAGATA".'-'.strtoupper(Str::random(5));
            $inven->save();
        }
    }
}
