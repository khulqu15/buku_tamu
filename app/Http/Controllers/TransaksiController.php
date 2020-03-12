<?php

namespace App\Http\Controllers;

use App\Inventaris;
use App\Kembali;
use App\Transaksi;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TransaksiController extends Controller
{

    public function search(Request $request)
    {
        $q = $request->search;
        $result = Transaksi::where("kode_transaksi", "LIKE", "%$q%")->first();
        $inventaris = Inventaris::find($result->inventaris_id);
        return view('pages.kembali_barang', ['transaksi' => $result, 'inventaris' => $inventaris]);
    }

    public function kembali(Request $request,$id)
    {
        $transaksi = Transaksi::find($id);
        $inventaris = Inventaris::find($transaksi->inventaris_id);

        $jumlah_tf = $transaksi->jumlah;
        $total_inven = $inventaris->jumlah + $jumlah_tf;
        $inventaris->jumlah = $total_inven;
        if($total_inven !== "0") {
            $inventaris->status = "Tersedia";
        } else {
            $inventaris->status = "Habis";
        }
        
        $transaksi->pengembalian = date('Y-m-d');

        $inventaris->save();
        $transaksi->save();
        if ($inventaris->save() && $transaksi->save()) {
            $arr = array(
                'status' => true,
                'data' => [],
                'msg' => "Sukses."
            );
        }else{
            $arr = array(
                'status' => false,
                'data' => [],
                'msg' => "Gagal."
            );
        }
        echo json_encode($arr);
    }

    public function pdf($kode_tf)
    {
        $transaksi = Transaksi::where('kode_transaksi', $kode_tf)->first();
        $inventaris = Inventaris::find($transaksi->inventaris_id);
        if(!$transaksi) {
            return redirect('/simpan_pinjam')->with('error', 'Kode transaksi salah');
        }
        $pdf = PDF::loadView('invoice.print', compact('transaksi', 'inventaris'))->setPaper('a7', 'potrait');
        return $pdf->stream();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::paginate(5);
        return view('admin.transaksi', ['transaksi' => $transaksi]);
    }

    public function transaksi_search(Request $request)
    {
        $query = $request->search;
        $transaksi = DB::table('transaksi')->where('nama_peminjam', 'LIKE', '%'.$query.'%')->orWhere('kode_transaksi', 'LIKE', '%'.$query.'%')->paginate(5);
        return view('admin.transaksi_result', ['transaksi' => $transaksi, 'query' => $query]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $inventaris = Inventaris::find($transaksi->inventaris_id);
        $inventaris->jumlah = $inventaris->jumlah + $transaksi->jumlah;
        $inventaris->save();
        $transaksi->delete();
        return redirect('/transaksi')->with('success', 'Berhasil dihapus');
    }
}
