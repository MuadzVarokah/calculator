<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Riwayat;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // Menampilkan halaman utama
    public function index() {
        $hasil = null;
        $riwayat = Riwayat::get();
        return view('index', compact('hasil', 'riwayat'));
    }

    //Melakukan perhitungan kemudian ditampilkan ke halaman utama
    public function hitung(Request $request) {
        //Pendevinisian Variabel
        $number_1 = $request->number_1;
        $number_2 = $request->number_2;
        $operasi = $request->operasi;

        //Pengkondisian operasi aritmatika
        if ($operasi == '+') { $hasil = $number_1 + $number_2; }
        else if ($operasi == '-') { $hasil = $number_1 - $number_2;}
        else if ($operasi == '*') { $hasil = $number_1 * $number_2;}
        else if ($operasi == '÷') {
            if ($number_2 == 0) {
                $hasil = 'infinity';
            } else {
                $hasil = $number_1 / $number_2;
            }
        } else if ($operasi == 'mod') { $hasil = $number_1 % $number_2; }

        //Jika hasilnya tidak infinity maka menyimpan data ke database
        if ($hasil != 'infinity') {
            Riwayat::create([
                'id'        => '',
                'number_1'  => $number_1,
                'number_2'  => $number_2,
                'operasi'   => $operasi,
                'hasil'     => $hasil,
            ]);
        }
        $riwayat = Riwayat::get();
        
        return view('index', compact('hasil', 'riwayat'));
    }

    //Membawa nilai hasil dari riwayat ke halaman utama
    public function ambil_riwayat($id) {
        $hasil = null;
        $nilai_riwayat = Riwayat::where('id', $id)->first();
        $riwayat = Riwayat::get();
        return view('index', compact('hasil', 'nilai_riwayat', 'riwayat'));
    }
}
