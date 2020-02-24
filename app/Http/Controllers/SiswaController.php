<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::orderBy('id', 'DESC')->paginate(5);
        return view('admin.siswa', ['siswa' => $siswa]);
    }

    public function siswa_search(Request $request)
    {
        $query = $request->search;
        $data = DB::table('siswa')->where('name', 'LIKE', '%'.$query.'%')
            ->orWhere('jurusan', 'LIKE', '%'.$query.'%')
            ->orWhere('kelas', 'LIKE', '%'.$query.'%')
            ->orWhere('jurusan', 'LIKE', '%'.$query.'%')->paginate(5);
        return view('admin.siswa_result', ['data' => $data, 'query' => $query])->render();
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
            $siswa = new Siswa();
            $request->validate([
                'jurusan' => 'nullable'
            ]);
            $siswa->name = $request->name;
            $siswa->gender = $request->gender;
            $siswa->kelas = $request->kelas;
            $siswa->jurusan = $request->jurusan;
            $siswa->jenjang = $request->jenjang;
            $siswa->alamat = $request->alamat;
            $siswa->save();

            return redirect('/siswa')->with('success', 'Siswa berhasil ditambah');

        } catch (\Throwable $th) {

            return redirect('/siswa')->with('error', 'Siswa gagal ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('admin.siswa_view', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $siswa = Siswa::find($id);
            $request->validate([
                'jurusan' => 'nullable'
            ]);
            $siswa->name = $request->name;
            $siswa->gender = $request->gender;
            $siswa->kelas = $request->kelas;
            $siswa->jurusan = $request->jurusan;
            $siswa->jenjang = $request->jenjang;
            $siswa->alamat = $request->alamat;
            $siswa->save();

            return redirect('/siswa/'.$id)->with('success', 'Siswa berhasil diubah');

        } catch (\Throwable $th) {

            return redirect('/siswa/'.$id)->with('error', 'Siswa gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Siswa berhasil dihapus');
    }
}
