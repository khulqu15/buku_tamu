<?php

namespace App\Http\Controllers;

use App\Tamu;
use App\Transaksi;
use App\User;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;

class DashboardController extends Controller
{

    public function pegawai()
    {
        $pegawai = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pegawai', ['pegawai' => $pegawai]);
    }

    public function pegawai_search(Request $request)
    {
        $query = $request->search;
        $data = DB::table('users')->where('name', 'LIKE', '%'.$query.'%')->paginate(5);
        return view('admin.pegawai_result', compact('data'))->render();

    }

    public function pegawai_store(Request $request)
    {
        try {
            $pegawai = new User();
            $pegawai->level = $request->level;
            if($request->level == "Admin") {
                $request->validate([
                    'username' => 'required',
                    'password_new' => 'required'
                ]);
                $pegawai->username = $request->username;
                if($request->password_new !== $request->password_knew) {
                    return redirect('/pegawai')->with('error', 'Konfirmasi password tidak sesuai');
                }
                $pegawai->password = Hash::make($request->password_new);
                $pegawai->api_token = Str::random(40);
                $pegawai->name = $request->name;
                $pegawai->gender = $request->gender;
                $pegawai->nip = $request->nip;
                if($request->hasFile('foto')) {
                    $foto = $request->file('foto');
                    $fotoName = time().'-'.Str::random(20).'.'.$foto->getClientOriginalExtension();
                    $foto->move('img/pegawai/', $fotoName);
                    $image = Image::make(sprintf('img/pegawai/%s', $fotoName))->resize(200, 200)->save();
                    $pegawai->foto = $fotoName;
                }
                $pegawai->jabatan = $request->jabatan;
                $pegawai->tmp_lahir = $request->tmp_lahir;
                $pegawai->tgl_lahir = $request->tgl_lahir;
                $pegawai->ruangan = $request->ruangan;
                $pegawai->save();
                return redirect('/pegawai')->with('success', 'Pegawai berhasil ditambah');
            } else {
                $request->validate([
                    'username' => 'nullable',
                    'password' => 'nullable'
                ]);
                $pegawai->name = $request->name;
                $pegawai->gender = $request->gender;
                $pegawai->nip = $request->nip;
                if($request->hasFile('foto')) {
                    $foto = $request->file('foto');
                    $fotoName = time().'-'.Str::random(20).'.'.$foto->getClientOriginalExtension();
                    $foto->move('img/pegawai/', $fotoName);
                    $image = Image::make(sprintf('img/pegawai/%s', $fotoName))->resize(200, 200)->save();
                    $pegawai->foto = $fotoName;
                }
                $pegawai->jabatan = $request->jabatan;
                $pegawai->tmp_lahir = $request->tmp_lahir;
                $pegawai->tgl_lahir = $request->tgl_lahir;
                $pegawai->ruangan = $request->ruangan;
                $pegawai->save();
                return redirect('/pegawai')->with('success', 'Pegawai berhasil ditambah');
            }
        } catch (\Throwable $th) {
            echo $th;
            die;
            return redirect('/pegawai')->with('error', 'Error di server');
        }
    }
    public function pegawai_destroy($id)
    {
        try {
            $pegawai = User::find($id);
            // if($pegawai->level !== "Admin") {
                $pegawai->delete();
                return redirect('/pegawai')->with('success', 'Data berhasil dihapus');
            // } else {
                // +return redirect('/pegawai')->with('error', 'Tidak bisa menghapus Admin');
            // }
        } catch (\Throwable $th) {
            return redirect('/pegawai')->with('error', 'Data gagal dihapus');
        }
    }
    public function pegawai_show($id)
    {
        $pegawai = User::find($id);
        if(!$pegawai || $pegawai == null) {
            return redirect('/pegawai')->with('error', 'Pegawai tidak ditemukan');
        }
        return view('admin.pegawai_view', ['pegawai' => $pegawai]);
    }
    public function pegawai_update(Request $request, $id)
    {
        try {
            $pegawai = User::find($id);
            $request->validate([
                'username' => 'nullable',
                'password' => 'nullable'
            ]);
            $pegawai->level = $request->level;
            $pegawai->name = $request->name;
            $pegawai->gender = $request->gender;
            $pegawai->nip = $request->nip;
            if($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time().'-'.Str::random(20).'.'.$foto->getClientOriginalExtension();
                File::delete('img/pegawai/'.$pegawai->foto);
                $foto->move('img/pegawai/', $fotoName);
                $image = Image::make(sprintf('img/pegawai/%s', $fotoName))->resize(200, 200)->save();
                $pegawai->foto = $fotoName;
            }
            $pegawai->jabatan = $request->jabatan;
            $pegawai->tmp_lahir = $request->tmp_lahir;
            $pegawai->tgl_lahir = $request->tgl_lahir;
            $pegawai->ruangan = $request->ruangan;
            if(Hash::check($request->password_old, $pegawai->password)) {
                $pegawai->username = $request->username;
                $password_hash = Hash::make($request->password_new);
                $pegawai->password = $password_hash;
                Auth::user()->username = $request->username;
                Auth::user()->password = $password_hash;
            } else {
                return redirect('/pegawai/'.$pegawai->id)->with('error', 'Password anda tidak sesuai');
            }
            $pegawai->save();
            return redirect('/pegawai/'.$pegawai->id)->with('success', 'Pegawai berhasil diubah');
        } catch (\Throwable $th) {
            return redirect('/pegawai/'.$pegawai->id)->with('error', $th);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tamu = Tamu::orderBy('created_at', 'DESC');


        // return view('users.index', ['tamuday' => $tamuday, 'date' => $tamuSekarang, '']);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
