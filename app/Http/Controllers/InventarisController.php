<?php

namespace App\Http\Controllers;

use App\Inventaris;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class InventarisController extends Controller
{

    public function peminjaman_search(Request $request)
    {
        $name = $request->search;
        $inventaris = DB::table('inventaris')->where('name', 'LIKE', '%'.$name.'%')->paginate(4, ['*'], 'page');
        $total = count($inventaris);
        if($total <= 0) {
            return redirect('/simpan_pinjam')->with('error', 'Item tidak ditemukan');
        }
        return view('pages.result_pinjam', ['inventaris' => $inventaris, 'key' => $name]);
    }

    public function pinjam(Request $request ,$id, $kode)
    {
        $inventaris = Inventaris::where('kode_barang', $kode)->first();
        if(!$inventaris) {
            return redirect('/pinjam/barang/'.$id)->with('error', 'Isi formulir terlebih dahulu');
        }
        $inventaris = Inventaris::find($id);
        $total = $inventaris->jumlah - $request->jumlah;
        $inventaris->jumlah = $total;
        if($total == "0") {
            $inventaris->status = "Habis";
        }
        $inventaris->save();

        $transaksi = new Transaksi();
        $kode_tf = time().'-'.strtoupper(Str::random(5));
        $transaksi->kode_transaksi = $kode_tf;
        $transaksi->inventaris_id = $id;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->alamat = $request->alamat;
        $transaksi->nama_peminjam = $request->nama_peminjam;
        $transaksi->phone_peminjam = $request->phone_peminjam;
        $transaksi->pengembalian = $request->pengembalian;
        $transaksi->save();

        return redirect('/pinjam/barang/'.$id.'/'.$kode_tf.'/foto')->with('success', 'Transaksi berhasil, lihat kode transaksi untuk proses selanjutnya');
        // return redirect('/pinjam/barang/'.$id.'/transaksi/'.$kode_tf)->with('success', 'Transaksi berhasil, lihat kode transaksi untuk proses selanjutnya');
    }

    public function getCode($id, $kode_tf)
    {
        $inventaris = Inventaris::find($id);
        $transaksi = Transaksi::where('kode_transaksi', $kode_tf)->first();
        return view('pages.pengembalian_reset', ['inventaris' => $inventaris, 'transaksi' => $transaksi]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        return view('pages.page-simpan', ['inventaris' => $inventaris]);
        // return view('pages.simpan', ['inventaris' => $inventaris]);
    }

    public function index_dashboard()
    {
        $inventaris = Inventaris::paginate(5);
        return view('admin.barang', ['inventaris' => $inventaris]);
    }

    public function barang_search(Request $request)
    {
        $query = $request->search;
        $inventaris = DB::table('inventaris')->where('name', 'LIKE', '%'.$query.'%')->paginate();
        return view('admin.barang_result', ['inventaris' => $inventaris, 'query' => $query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inventaris = new Inventaris();
            $inventaris->name = $request->name;
            $inventaris->description = $request->description;
            $inventaris->jumlah = $request->jumlah;
            if($request->jumlah > 0) {
                $inventaris->status = "Tersedia";
            } else {
                $inventaris->status = "Habis";
            }
            if($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $foto_name = time().'-'.Str::random(10).'.'.$foto->getClientOriginalExtension();
                $foto->move('img/inventaris/', $foto_name);
                $inventaris->foto = $foto_name;
            }
            $inventaris->kode_barang = "INAGATA-".Str::random(6);
            $inventaris->save();

            return redirect('/barang')->with('success', 'Barang berhasil ditambah');
        } catch(\Throwable $th) {
            return redirect('/barang')->with('error', 'Barang gagal ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaris = Inventaris::find($id);
        return view('pages.simpan_detail', ['inventaris' => $inventaris]);
    }

    public function pinjam_foto(Request $request, $id, $kode)
    {
        $inventaris = Inventaris::find($id);
        $transaksi = Transaksi::where('kode_transaksi', $kode)->first();
        $transaksiId = $inventaris->id;
        $kode_tf = $transaksi->kode_transaksi;
        // die;
        return view('pages.pinjam_foto', ['id' => $transaksiId, 'kode' => $kode_tf]);
    }

    public function webcam(Request $request, $id, $kode)
    {

        $transaksi = Transaksi::where('kode_transaksi', $kode)->first();
        $select_transaksi = Transaksi::find($transaksi->id);

        if($select_transaksi->foto !== '' || $select_transaksi->foto !== null) {
            File::delete('webcam/transaksi/'.$transaksi->foto);
        }

        $image = $request->image;
        $image = str_replace('data:image/jpeg;base64', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time().'-'.strtoupper(Str::random(5)).'.'.'jpeg';

        File::put(public_path().'/webcam/transaksi/'.$imageName, base64_decode($image));

        $select_transaksi->foto = $imageName;
        $select_transaksi->save();

        return redirect('/pinjam/barang/'.$id.'/transaksi/'.$kode)->with('success', 'Foto berhasil diterapkan');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventaris = Inventaris::find($id);
        return view('admin.barang_view', ['inventaris' => $inventaris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $inventaris = Inventaris::find($id);
            $inventaris->name = $request->name;
            $inventaris->description = $request->description;
            $inventaris->jumlah = $request->jumlah;
            if($request->jumlah > 0) {
                $inventaris->status = "Tersedia";
            } else {
                $inventaris->status = "Habis";
            }
            if($request->hasFile('foto')) {
                $foto = $request->file('foto');
                File::delete('img/inventaris/'.$inventaris->foto);
                $foto_name = time().'-'.Str::random(10).'.'.$foto->getClientOriginalExtension();
                $foto->move('img/inventaris/', $foto_name);
                $inventaris->foto = $foto_name;
            }
            $inventaris->kode_barang = "INAGATA-".Str::random(6);
            $inventaris->save();

            return redirect('/barang/'.$inventaris->id)->with('success', 'Barang berhasil ditambah');
        } catch(\Throwable $th) {
            return redirect('/barang/'.$inventaris->id)->with('error', 'Barang gagal ditambah');
        }
    }

    public function update_alone(Request $request, $id, $kode)
    {
        $inventaris = Inventaris::find($id);
        $select_transaksi = Transaksi::where('kode_transaksi', $kode)->first();
        $transaksi = Transaksi::find($select_transaksi->id);

        $inventaris->jumlah = $inventaris->jumlah + $transaksi->jumlah;
        $inventaris->jumlah = $inventaris->jumlah - $request->jumlah;
        $inventaris->save();

        $transaksi->nama_peminjam = $request->nama_peminjam;
        $transaksi->phone_peminjam = $request->phone_peminjam;
        $transaksi->alamat = $request->alamat;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->save();

        return view('pages.pinjam_code', ['inventaris' => $inventaris, 'transaksi' => $transaksi, 'success' => 'Berhasil disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventaris  $inventaris
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);
        File::delete('img/inventaris/'.$inventaris->foto);
        $inventaris->delete();
        return redirect('/barang')->with('success', 'Berhasil dihapus');
    }
}
