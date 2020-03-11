<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_img = Image::where('active', 'active')->first();
        $other_img = Image::where('active', 'active1')->first();
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
        if($request->hasFile('main_file')) {
            $main_file = new Image();
            $file_main = $request->file('main_file');
            $main_file_name = time() . '-' . Str::random(10).'.'.$file_main->getClientOriginalExtension();
            $main_file->name_file = $main_file_name;
            $main_file->type_file = $file_main->getClientOriginalExtension();
            $main_file->status_file = 'active';
            $file_main->move('background/', $main_file_name);
            $main_file->save();
        }
        if($request->hasFile('other_file')) {
            $other_file = new Image();
            $file_other = $request->file('other_file');
            $other_file_name = time() . '-' . Str::random(10).'.'.$file_other->getClientOriginalExtension();
            $other_file->name_file = $other_file_name;
            $other_file->type_file = $file_main->getClientOriginalExtension();
            $other_file->status_file = 'active1';
            $file_other->move('background/', $other_file_name);
            $other_file->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file_active = Image::where('active', 'active')->first();
        $file_active1 = Image::where('active', 'active1')->first();
        if($request->hasFile('main_file')) {
            $main_file = new Image();
            $file_main = $request->file('main_file');
            $main_file_name = time() . '-' . Str::random(10).'.'.$file_main->getClientOriginalExtension();
            $main_file->name_file = $main_file_name;
            $main_file->type_file = $file_main->getClientOriginalExtension();
            $main_file->status_file = 'active';
            $file_main->move('background/', $main_file_name);
            File::delete('background/'.$file_active->name_file);
            $main_file->save();
            $file_active->delete();
        }
        if($request->hasFile('other_file')) {
            $other_file = new Image();
            $file_other = $request->file('other_file');
            $other_file_name = time() . '-' . Str::random(10).'.'.$file_other->getClientOriginalExtension();
            $other_file->name_file = $other_file_name;
            $other_file->type_file = $file_main->getClientOriginalExtension();
            $other_file->status_file = 'active1';
            $file_other->move('background/', $other_file_name);
            File::delete('background/'.$file_active1->name_file);
            $other_file->save();
            $file_active1->delete();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
