<?php

namespace App\Http\Controllers;

use App\Kembali;
use App\Tamu;
use App\Transaksi;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {

        // Week
        // current time
        $today = Carbon::today()->format('Y-m-d');
        $kemarin = Carbon::yesterday()->format('Y-m-d');
        $harim2 = Carbon::now()->addDays(-2)->format('Y-m-d');
        $harim3 = Carbon::now()->add(-3, 'day')->toDateString();
        $harim4 = Carbon::now()->add(-4, 'day')->toDateString();
        $harim5 = Carbon::now()->add(-5, 'day')->toDateString();
        $harim6 = Carbon::now()->add(-7, 'day')->toDateString();

        $tamuSekarang = Tamu::whereDate('created_at', '=', $today)->get();
        $tamuKemarin = Tamu::whereDate('created_at', '=', $kemarin)->get();
        $tamuh2 = Tamu::whereDate('created_at', '=', $harim2)->get();
        $tamuh3 = Tamu::whereDate('created_at', '=', $harim3)->get();
        $tamuh4 = Tamu::whereDate('created_at', '=', $harim4)->get();
        $tamuh5 = Tamu::whereDate('created_at', '=', $harim5)->get();
        $tamuh6 = Tamu::whereDate('created_at', '=', $harim6)->get();

        $days = [
            $d1 = Carbon::today()->dayName,
            $d2 = Carbon::yesterday()->dayName,
            $d2 = Carbon::now()->addDays(-2)->dayName,
            $d3 = Carbon::now()->add(-3, 'day')->dayName,
            $d4 = Carbon::now()->add(-4, 'day')->dayName,
            $d5 = Carbon::now()->add(-5, 'day')->dayName,
            $d6 = Carbon::now()->add(-7, 'day')->dayName,
            $d7 = Carbon::now()->add(-8, 'day')->dayName,
        ];
        $tamuday = [
            $b1 = count($tamuSekarang),
            $b2 = count($tamuKemarin),
            $b3 = count($tamuh2),
            $b4 = count($tamuh3),
            $b5 = count($tamuh4),
            $b6 = count($tamuh5),
            $b7 = count($tamuh6),
        ];


        // pengembalian
        $kembaliNow = Kembali::whereDate('created_at', '=', $today)->get();
        $kembali1 = Kembali::whereDate('created_at', '=', $kemarin)->get();
        $kembali2 = Kembali::whereDate('created_at', '=', $harim2)->get();
        $kembali3 = Kembali::whereDate('created_at', '=', $harim3)->get();
        $kembali4 = Kembali::whereDate('created_at', '=', $harim4)->get();
        $kembali5 = Kembali::whereDate('created_at', '=', $harim5)->get();
        $kembali6 = Kembali::whereDate('created_at', '=', $harim6)->get();

        $kembaliWeeks = [
            $b1 = count($kembaliNow),
            $b2 = count($kembali1),
            $b3 = count($kembali2),
            $b4 = count($kembali3),
            $b5 = count($kembali4),
            $b6 = count($kembali5),
            $b7 = count($kembali6),
        ];


        // peminjaman
        $peminjamanNow = Transaksi::whereDate('created_at', '=', $today)->get();
        $peminjaman1 = Transaksi::whereDate('created_at', '=', $kemarin)->get();
        $peminjaman2 = Transaksi::whereDate('created_at', '=', $harim2)->get();
        $peminjaman3 = Transaksi::whereDate('created_at', '=', $harim3)->get();
        $peminjaman4 = Transaksi::whereDate('created_at', '=', $harim4)->get();
        $peminjaman5 = Transaksi::whereDate('created_at', '=', $harim5)->get();
        $peminjaman6 = Transaksi::whereDate('created_at', '=', $harim6)->get();

        $peminjamanWeeks = [
            $b1 = count($peminjamanNow),
            $b2 = count($peminjaman1),
            $b3 = count($peminjaman2),
            $b4 = count($peminjaman3),
            $b5 = count($peminjaman4),
            $b6 = count($peminjaman5),
            $b7 = count($peminjaman6),
        ];


        return view('dashboard', ['tamuday' => $tamuday, 'days' => $days, 'kembali' => $kembaliWeeks, 'peminjaman' => $peminjamanWeeks]);
    }
}
