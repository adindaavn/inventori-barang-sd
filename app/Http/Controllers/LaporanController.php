<?php

namespace App\Http\Controllers;

use App\Models\BarangDipinjam;
use App\Models\BarangTersedia;
use App\Models\Pengembalian;
use App\Models\StatusBarang;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function dipinjam()
    {
        $dipinjam = BarangDipinjam::all();
        return view('peminjaman.brg-blm-kmbl', compact('dipinjam'));
    }

    public function tersedia()
    {
        $tersedia = BarangTersedia::all();
        return view('laporan.barang-tersedia', compact('tersedia'));
    }

    public function pengembalian()
    {
        $pengembalian = Pengembalian::all();
        return view('laporan.pengembalian-barang', compact('pengembalian'));
    }

    public function status()
    {
        $status = StatusBarang::all();
        return view('laporan.status-barang', compact('status'));
    }

    public function pengguna()
    {
        $users = User::all();
        return view('laporan.daftar-pengguna', compact('users'));
    }
}
