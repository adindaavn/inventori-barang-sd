<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all()->count('nik');
        $pengaduan = Pengaduan::all()->count('id_pengaduan');
        $petugas = Petugas::all()->count('id_petugas');
        $tanggapan = Tanggapan::all()->count('id_tanggapan');
        return view('home', compact('masyarakat','pengaduan','petugas','tanggapan'));
    }
}
