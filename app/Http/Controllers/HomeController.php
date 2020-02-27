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
        // per hari
        $today = Carbon::today()->format('Y-m-d');
        $kemarin = Carbon::yesterday()->format('Y-m-d');
        $harim2 = Carbon::now()->addDays(-2)->format('Y-m-d');
        $harim3 = Carbon::now()->add(-3, 'day')->toDateString();
        $harim4 = Carbon::now()->add(-4, 'day')->toDateString();
        $harim5 = Carbon::now()->add(-5, 'day')->toDateString();
        $harim6 = Carbon::now()->add(-7, 'day')->toDateString();

        // per jam
        $harimj1 = Carbon::now()->subHours(6)->toDateTimeString();
        $harimj2 = Carbon::now()->subHours(12)->toDateTimeString();
        $harimj3 = Carbon::now()->subHours(18)->toDateTimeString();
        $harimj4 = Carbon::now()->subHours(24)->toDateTimeString();

        // per minggu
        $harim13 = Carbon::now()->add(-14, 'day')->toDateString();
        $harim21 = Carbon::now()->add(-22, 'day')->toDateString();
        $harim28 = Carbon::now()->add(-30, 'day')->toDateString();

        // per bulan
        $harib2 = Carbon::now()->add(-30 * 2, 'day')->toDateString();
        $harib3 = Carbon::now()->add(-30 * 3, 'day')->toDateString();
        $harib4 = Carbon::now()->add(-30 * 4, 'day')->toDateString();
        $harib5 = Carbon::now()->add(-30 * 5, 'day')->toDateString();
        $harib6 = Carbon::now()->add(-30 * 6, 'day')->toDateString();
        $harib7 = Carbon::now()->add(-30 * 7, 'day')->toDateString();
        $harib8 = Carbon::now()->add(-30 * 8, 'day')->toDateString();
        $harib9 = Carbon::now()->add(-30 * 9, 'day')->toDateString();
        $harib10 = Carbon::now()->add(-30 * 10, 'day')->toDateString();
        $harib11 = Carbon::now()->add(-30 * 11, 'day')->toDateString();
        $harib12 = Carbon::now()->add(-30 * 12, 'day')->toDateString();

        // per tahun (5)
        $harit2 = Carbon::now()->add((-30 * 12) * 2, 'day')->toDateString();
        $harit3 = Carbon::now()->add((-30 * 12) * 3, 'day')->toDateString();
        $harit4 = Carbon::now()->add((-30 * 12) * 4, 'day')->toDateString();
        $harit5 = Carbon::now()->add((-30 * 12) * 5, 'day')->toDateString();


        // per6jam dalam 1 hari
        // tamu
        $tamuJam1 = Tamu::where('created_at', '>', $harimj1)->get();
        $tamuJam2 = Tamu::where('created_at', '>', $harimj2)->where('created_at', '<', $harimj1)->get();
        $tamuJam3 = Tamu::where('created_at', '>', $harimj3)->where('created_at', '<', $harimj2)->get();
        $tamuJam4 = Tamu::where('created_at', '>', $harimj4)->where('created_at', '<', $harimj3)->get();
        // peminjaman
        $peminjamanJam1 = Transaksi::where('created_at', '>', $harimj1)->get();
        $peminjamanJam2 = Transaksi::where('created_at', '>', $harimj2)->where('created_at', '<', $harimj1)->get();
        $peminjamanJam3 = Transaksi::where('created_at', '>', $harimj3)->where('created_at', '<', $harimj2)->get();
        $peminjamanJam4 = Transaksi::where('created_at', '>', $harimj4)->where('created_at', '<', $harimj3)->get();
        // pengembalian
        $pengembalianJam1 = Kembali::where('created_at', '>', $harimj1)->get();
        $pengembalianJam2 = Kembali::where('created_at', '>', $harimj2)->where('created_at', '<', $harimj1)->get();
        $pengembalianJam3 = Kembali::where('created_at', '>', $harimj3)->where('created_at', '<', $harimj2)->get();
        $pengembalianJam4 = Kembali::where('created_at', '>', $harimj4)->where('created_at', '<', $harimj3)->get();

        // perHari dalam seminggu
        // tamu
        $tamuSekarang = Tamu::whereDate('created_at', '=', $today)->get();
        $tamuKemarin = Tamu::whereDate('created_at', '=', $kemarin)->get();
        $tamuh2 = Tamu::whereDate('created_at', '=', $harim2)->get();
        $tamuh3 = Tamu::whereDate('created_at', '=', $harim3)->get();
        $tamuh4 = Tamu::whereDate('created_at', '=', $harim4)->get();
        $tamuh5 = Tamu::whereDate('created_at', '=', $harim5)->get();
        $tamuh6 = Tamu::whereDate('created_at', '=', $harim6)->get();
        // peminjaman
        $peminjamanNow = Transaksi::whereDate('created_at', '=', $today)->get();
        $peminjaman1 = Transaksi::whereDate('created_at', '=', $kemarin)->get();
        $peminjaman2 = Transaksi::whereDate('created_at', '=', $harim2)->get();
        $peminjaman3 = Transaksi::whereDate('created_at', '=', $harim3)->get();
        $peminjaman4 = Transaksi::whereDate('created_at', '=', $harim4)->get();
        $peminjaman5 = Transaksi::whereDate('created_at', '=', $harim5)->get();
        $peminjaman6 = Transaksi::whereDate('created_at', '=', $harim6)->get();
        // pengembalian
        $kembaliNow = Kembali::whereDate('created_at', '=', $today)->get();
        $kembali1 = Kembali::whereDate('created_at', '=', $kemarin)->get();
        $kembali2 = Kembali::whereDate('created_at', '=', $harim2)->get();
        $kembali3 = Kembali::whereDate('created_at', '=', $harim3)->get();
        $kembali4 = Kembali::whereDate('created_at', '=', $harim4)->get();
        $kembali5 = Kembali::whereDate('created_at', '=', $harim5)->get();
        $kembali6 = Kembali::whereDate('created_at', '=', $harim6)->get();

        // perMinggu dalam sebulan
        // tamu
        $tamum1 = Tamu::whereBetween('created_at', [$harim6, $today])->get();
        $tamum2 = Tamu::whereBetween('created_at', [$harim13, $harim6])->get();
        $tamum3 = Tamu::whereBetween('created_at', [$harim21, $harim13])->get();
        $tamum4 = Tamu::whereBetween('created_at', [$harim28, $harim21])->get();
        // peminjaman
        $peminjamanm1 = Transaksi::whereBetween('created_at', [$harim6, $today])->get();
        $peminjamanm2 = Transaksi::whereBetween('created_at', [$harim13, $harim6])->get();
        $peminjamanm3 = Transaksi::whereBetween('created_at', [$harim21, $harim13])->get();
        $peminjamanm4 = Transaksi::whereBetween('created_at', [$harim28, $harim21])->get();
        // pengembalian
        $pengembalianm1 = Kembali::whereBetween('created_at', [$harim6, $today])->get();
        $pengembalianm2 = Kembali::whereBetween('created_at', [$harim13, $harim6])->get();
        $pengembalianm3 = Kembali::whereBetween('created_at', [$harim21, $harim13])->get();
        $pengembalianm4 = Kembali::whereBetween('created_at', [$harim28, $harim21])->get();

        // perBulan dalam setahun
        // tamu
        $tamub1 = Tamu::whereBetween('created_at', [$harib2, $today])->get();
        $tamub2 = Tamu::whereBetween('created_at', [$harib3, $harib2])->get();
        $tamub3 = Tamu::whereBetween('created_at', [$harib4, $harib3])->get();
        $tamub4 = Tamu::whereBetween('created_at', [$harib5, $harib4])->get();
        $tamub5 = Tamu::whereBetween('created_at', [$harib6, $harib5])->get();
        $tamub6 = Tamu::whereBetween('created_at', [$harib7, $harib6])->get();
        $tamub7 = Tamu::whereBetween('created_at', [$harib8, $harib7])->get();
        $tamub8 = Tamu::whereBetween('created_at', [$harib9, $harib8])->get();
        $tamub9 = Tamu::whereBetween('created_at', [$harib10, $harib9])->get();
        $tamub10 = Tamu::whereBetween('created_at', [$harib11, $harib10])->get();
        $tamub11 = Tamu::whereBetween('created_at', [$harib12, $harib11])->get();
        // peminjaman
        $peminjamanb1 = Transaksi::whereBetween('created_at', [$harib2, $today])->get();
        $peminjamanb2 = Transaksi::whereBetween('created_at', [$harib3, $harib2])->get();
        $peminjamanb3 = Transaksi::whereBetween('created_at', [$harib4, $harib3])->get();
        $peminjamanb4 = Transaksi::whereBetween('created_at', [$harib5, $harib4])->get();
        $peminjamanb5 = Transaksi::whereBetween('created_at', [$harib6, $harib5])->get();
        $peminjamanb6 = Transaksi::whereBetween('created_at', [$harib7, $harib6])->get();
        $peminjamanb7 = Transaksi::whereBetween('created_at', [$harib8, $harib7])->get();
        $peminjamanb8 = Transaksi::whereBetween('created_at', [$harib9, $harib8])->get();
        $peminjamanb9 = Transaksi::whereBetween('created_at', [$harib10, $harib9])->get();
        $peminjamanb10 = Transaksi::whereBetween('created_at', [$harib11, $harib10])->get();
        $peminjamanb11 = Transaksi::whereBetween('created_at', [$harib12, $harib11])->get();
        // pengembalian
        $pengembalianb1 = Kembali::whereBetween('created_at', [$harib2, $today])->get();
        $pengembalianb2 = Kembali::whereBetween('created_at', [$harib3, $harib2])->get();
        $pengembalianb3 = Kembali::whereBetween('created_at', [$harib4, $harib3])->get();
        $pengembalianb4 = Kembali::whereBetween('created_at', [$harib5, $harib4])->get();
        $pengembalianb5 = Kembali::whereBetween('created_at', [$harib6, $harib5])->get();
        $pengembalianb6 = Kembali::whereBetween('created_at', [$harib7, $harib6])->get();
        $pengembalianb7 = Kembali::whereBetween('created_at', [$harib8, $harib7])->get();
        $pengembalianb8 = Kembali::whereBetween('created_at', [$harib9, $harib8])->get();
        $pengembalianb9 = Kembali::whereBetween('created_at', [$harib10, $harib9])->get();
        $pengembalianb10 = Kembali::whereBetween('created_at', [$harib11, $harib10])->get();
        $pengembalianb11 = Kembali::whereBetween('created_at', [$harib12, $harib11])->get();

        // per5tahun
        // tamu
        $tamuold1 = Tamu::whereBetween('created_at', [$harit2, $today])->get();
        $tamuold2 = Tamu::whereBetween('created_at', [$harit3, $harit2])->get();
        $tamuold3 = Tamu::whereBetween('created_at', [$harit4, $harit3])->get();
        $tamuold4 = Tamu::whereBetween('created_at', [$harit5, $harit4])->get();
        // peminjaman
        $peminjamanold1 = Transaksi::whereBetween('created_at', [$harit2, $today])->get();
        $peminjamanold2 = Transaksi::whereBetween('created_at', [$harit3, $harit2])->get();
        $peminjamanold3 = Transaksi::whereBetween('created_at', [$harit4, $harit3])->get();
        $peminjamanold4 = Transaksi::whereBetween('created_at', [$harit5, $harit4])->get();
        // pengembalian
        $pengembalianold1 = Kembali::whereBetween('created_at', [$harit2, $today])->get();
        $pengembalianold2 = Kembali::whereBetween('created_at', [$harit3, $harit2])->get();
        $pengembalianold3 = Kembali::whereBetween('created_at', [$harit4, $harit3])->get();
        $pengembalianold4 = Kembali::whereBetween('created_at', [$harit5, $harit4])->get();

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

        $tamudays = [
            $b1 = count($tamuSekarang),
            $b2 = count($tamuKemarin),
            $b3 = count($tamuh2),
            $b4 = count($tamuh3),
            $b5 = count($tamuh4),
            $b6 = count($tamuh5),
            $b7 = count($tamuh6),
        ];
        $kembalidays = [
            $b1 = count($kembaliNow),
            $b2 = count($kembali1),
            $b3 = count($kembali2),
            $b4 = count($kembali3),
            $b5 = count($kembali4),
            $b6 = count($kembali5),
            $b7 = count($kembali6),
        ];
        $peminjamandays = [
            $b1 = count($peminjamanNow),
            $b2 = count($peminjaman1),
            $b3 = count($peminjaman2),
            $b4 = count($peminjaman3),
            $b5 = count($peminjaman4),
            $b6 = count($peminjaman5),
            $b7 = count($peminjaman6),
        ];

        $tamuweeks = [
            $b1 = count($tamum1),
            $b2 = count($tamum2),
            $b3 = count($tamum3),
            $b4 = count($tamum4),
        ];
        $peminjamanweeks = [
            $b1 = count($peminjamanm1),
            $b2 = count($peminjamanm2),
            $b3 = count($peminjamanm3),
            $b4 = count($peminjamanm4),
        ];
        $pengembalianweeks = [
            $b1 = count($pengembalianm1),
            $b2 = count($pengembalianm2),
            $b3 = count($pengembalianm3),
            $b4 = count($pengembalianm4),
        ];

        $tamumonth = [
            $b1 = count($tamub1),
            $b2 = count($tamub2),
            $b3 = count($tamub3),
            $b4 = count($tamub4),
            $b5 = count($tamub5),
            $b6 = count($tamub6),
            $b7 = count($tamub7),
            $b8 = count($tamub8),
            $b9 = count($tamub9),
            $b10 = count($tamub10),
            $b11 = count($tamub11)
        ];

        $peminjamanmonth = [
            $b1 = count($peminjamanb1),
            $b2 = count($peminjamanb2),
            $b3 = count($peminjamanb3),
            $b4 = count($peminjamanb4),
            $b5 = count($peminjamanb5),
            $b6 = count($peminjamanb6),
            $b7 = count($peminjamanb7),
            $b8 = count($peminjamanb8),
            $b9 = count($peminjamanb9),
            $b10 = count($peminjamanb10),
            $b11 = count($peminjamanb11)
        ];

        $pengembaliannmonth = [
            $b1 = count($pengembalianb1),
            $b2 = count($pengembalianb2),
            $b3 = count($pengembalianb3),
            $b4 = count($pengembalianb4),
            $b5 = count($pengembalianb5),
            $b6 = count($pengembalianb6),
            $b7 = count($pengembalianb7),
            $b8 = count($pengembalianb8),
            $b9 = count($pengembalianb9),
            $b10 = count($pengembalianb10),
            $b11 = count($pengembalianb11)
        ];

        $month = [
            $h2 = Carbon::now()->add(-30 * 2, 'day')->monthName,
            $h3 = Carbon::now()->add(-30 * 3, 'day')->monthName,
            $h4 = Carbon::now()->add(-30 * 4, 'day')->monthName,
            $h5 = Carbon::now()->add(-30 * 5, 'day')->monthName,
            $h6 = Carbon::now()->add(-30 * 6, 'day')->monthName,
            $h7 = Carbon::now()->add(-30 * 7, 'day')->monthName,
            $h8 = Carbon::now()->add(-30 * 8, 'day')->monthName,
            $h9 = Carbon::now()->add(-30 * 9, 'day')->monthName,
            $h10 = Carbon::now()->add(-30 * 10, 'day')->monthName,
            $h11 = Carbon::now()->add(-30 * 11, 'day')->monthName,
            $h12 = Carbon::now()->add(-30 * 12, 'day')->monthName,
        ];

        $years = [
            $b1 = Carbon::now()->year,
            $b2 = Carbon::now()->add((-30 * 12) * 2, 'day')->year,
            $b3 = Carbon::now()->add((-30 * 12) * 3, 'day')->year,
            $b4 = Carbon::now()->add((-30 * 12) * 4, 'day')->year,
            $b5 = Carbon::now()->add((-30 * 12) * 5, 'day')->year,
        ];

        $tamuyears = [
            $b1 = count($tamuold1),
            $b2 = count($tamuold2),
            $b3 = count($tamuold3),
            $b4 = count($tamuold4),
        ];
        $peminjamanyears = [
            $b1 = count($peminjamanold1),
            $b2 = count($peminjamanold2),
            $b3 = count($peminjamanold3),
            $b4 = count($peminjamanold4),
        ];
        $kembaliyears = [
            $b1 = count($pengembalianold1),
            $b2 = count($pengembalianold2),
            $b3 = count($pengembalianold3),
            $b4 = count($pengembalianold4),
        ];

        return view('dashboard',
            ['tamudays' => $tamudays, 'days' => $days, 'kembalidays' => $kembalidays, 'peminjamandays' => $peminjamandays,
            'tamuweeks' => $tamuweeks, 'peminjamanweeks' => $peminjamanweeks, 'kembaliweeks' => $pengembalianweeks,
            'tamumonth' => $tamumonth, 'peminjamanmonth' => $peminjamanmonth, 'kembalimonth' => $pengembaliannmonth, 'month' => $month,
            'tamuyears' => $tamuyears, 'peminjamanyears' => $peminjamanyears, 'kembaliyears' => $kembaliyears, 'years' => $years]);
    }
}
