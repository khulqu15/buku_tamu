<?php

namespace App\Http\Controllers;

use App\Tamu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TamuController extends Controller
{

    protected $only_guest;
    public function __construct()
    {

    }

    public function webcamPage($token, $id)
    {
        $isToken = Tamu::where('api_token', $token)->first();
        if(!$isToken) {
            return redirect('/buku_tamu')->with('error', 'Isi form terlebih dahulu');
        } else {
            $pegawai = User::find($id);
            return view('pages.buku_foto', ['pegawai' => $pegawai, 'token' => $token, 'id' => $id]);
        }
    }

    public function webcam(Request $request, $token, $id)
    {
        $isToken = Tamu::where('api_token', $token)->first();
        if(!$isToken) {
            return redirect('/buku_tamu')->with('error', 'Isi form terlebih dahulu');
        } else {
            $tamu = Tamu::where('api_token', $token)->first();
            $select_tamu = Tamu::find($tamu->id);

            $pegawai = User::find($id);
            $image = $request->image;
            $image = str_replace('data:image/jpeg;base64', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = time().'-'.strtoupper(Str::random(5)).'.'.'jpeg';

            File::put(public_path().'/webcam/tamu/'.$imageName, base64_decode($image));

            $select_tamu->foto = $imageName;
            $select_tamu->save();

            return redirect('/buku_tamu/'.$token.'/pegawai/'.$id)->with('success', 'Foto berhasil diterapkan');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tamu = Tamu::orderBy('id', 'DESC')->paginate(5);
        return view('admin.tamu', ['tamu' => $tamu]);
    }

    public function tamu_search(Request $request)
    {
        $query = $request->search;
        $to = $request->to_date;
        $from = $request->from_date;
        if($to == '' || $from == '') {
            $tamu = DB::table('tamu')->where('name', 'LIKE', '%'.$query.'%')->paginate(5);
        } else {
            $tamu = DB::table('tamu')->where('name', 'LIKE', '%'.$query.'%')->whereBetween('created_at', array($from, $to))->paginate(5);
        }
        return view('admin.tamu_result', ['tamu' => $tamu, 'query' => $query, 'from' => $from, 'to' => $to])->render();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = User::all();
        return view('pages.buku', ['pegawai' => $pegawai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // try {
            $tamu = new Tamu();
            $tamu->name = $request->name;
            $token = Str::random(10);
            $tamu->api_token = $token;
            $tamu->gender = $request->gender;
            $tamu->phone = $request->phone;
            $tamu->umur = $request->umur;
            $tamu->alamat = $request->alamat;
            $tamu->instansi = $request->instansi;
            $tamu_id = $request->user;
            $tamu->user_id = $tamu_id;
            $tamu->tujuan = $request->tujuan;
            $request->validate([
                'instansi' => 'nullable',
            ]);
            $tamu->save();
            return redirect('/buku_tamu/'.$token.'/foto/pegawai/'.$tamu_id)->with('success', 'Data berhasil disimpan, Ambil foto anda untuk melanjutkan');
        // } catch (\Throwable $th) {
        //     return redirect('/buku_tamu')->with('error', 'Kesalahan terjadi di server');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function show($token, $id)
    {
        $tamu = Tamu::where('api_token', $token)->first();
        $pegawai = User::find($id);
        return view('pages.buku_pegawai', ['success' => 'Anda telah berhasil mengisi formulir tamu', 'tamu' => $tamu, 'pegawai' => $pegawai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function edit(Tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tamu $tamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tamu  $tamu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tamu = Tamu::find($id);
        $tamu->delete();

        return redirect('/tamu')->with('success', 'Tamu berhasil dihapus');
    }
}
