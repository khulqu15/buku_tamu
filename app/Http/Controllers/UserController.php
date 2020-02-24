<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password'))) {
            return redirect('/dashboard')->with('success', 'Berhasil Login');
        } else {
            return redirect('/login')->with('error', 'Gagal Login');
        }
    }
}
