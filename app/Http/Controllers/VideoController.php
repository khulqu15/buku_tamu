<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = Video::where('active', 'active')->first();
        return view('home', ['video' => $video]);
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
            $request->validate([
                'file_bg' => 'required|mimes:jpeg,png,jpg,svg,mp4,avi,mpg,webm',
            ]);
            $otherFile = Video::where('active', 'active')->first();
            if($otherFile) {
                File::delete('bg/beranda/'.$otherFile->name);
                $otherFile->delete();
            }
            if($request->hasFile('file_bg')) {
                $file_upload = new Video();
                $file = $request->file('file_bg');
                $file_name = time().'-'.Str::random(5).'.'.$file->getClientOriginalExtension();
                $file->move('bg/beranda/', $file_name);
                $file_upload->name = $file_name;
                $type = $file->getClientOriginalExtension();
                if($type == "jpeg" || $type == "png" || $type == "jpg" || $type == "svg") {
                    $file_upload->type = "gambar";
                } else if ($type == "mp4" || $type == "avi" || $type == "mpg" || $type == "webm") {
                    $file_upload->type = "video";
                }
                $file_upload->user_id = Auth::user()->id;
                $file_upload->active = 'active';
                $file_upload->save();
                return redirect('pengaturan')->with('success', 'File background berhasil diupload');
            } else {
                return redirect('pengaturan')->with('error', 'Pilih file terlebih dahulu');
            }
        }
        catch(\Throwable $th) {
            return redirect('pengaturan')->with('error', $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
