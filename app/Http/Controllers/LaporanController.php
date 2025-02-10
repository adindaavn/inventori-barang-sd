<?php

namespace App\Http\Controllers;

use App\Models\BarangDipinjam;
use App\Models\BarangTersedia;
use App\Models\Pengembalian;
use App\Models\StatusBarang;
use App\Models\TrSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $activeTab = 'tersedia'; 
        $pengembalian = Pengembalian::all();
        $status = StatusBarang::all();
        $tersedia = BarangTersedia::all();
        return view('laporan.index', compact('pengembalian', 'status', 'tersedia', 'activeTab'));
    }

    public function siswa()
    {
        $siswa = TrSiswa::all();
        return view('siswa.index', compact('siswa'));
    }

    public function dipinjam()
    {
        $dipinjam = BarangDipinjam::all();
        return view('peminjaman.brg-blm-kmbl', compact('dipinjam'));
    }

    public function tersedia(Request $request)
    {
        $activeTab = $request->query('tab', 'tersedia'); 
        $query = BarangTersedia::query();

        if ($request->has(['dateFrom', 'dateTo'])) {
            $dateFrom = $request->dateFrom;
            $dateTo = $request->dateTo . ' 23:59:59';

            $query->whereBetween('br_tgl_terima', [$dateFrom, $dateTo]);
        }

        $tersedia = $query->get();

        $pengembalian = Pengembalian::all();
        $status = StatusBarang::all();
        return view('laporan.index', compact('pengembalian', 'status', 'tersedia', 'activeTab'));
    }

    public function pengembalian(Request $request)
    {
        $activeTab = $request->query('tab', 'pengembalian'); 
        $query = Pengembalian::query();

        if ($request->has(['dateFrom', 'dateTo'])) {
            $dateFrom = $request->dateFrom;
            $dateTo = $request->dateTo . ' 23:59:59';

            $query->whereBetween('kembali_tgl', [$dateFrom, $dateTo]);
        }

        $pengembalian = $query->get();

        $status = StatusBarang::all();
        $tersedia = BarangTersedia::all();
        return view('laporan.index', compact('pengembalian', 'status', 'tersedia', 'activeTab'));
    }

    public function status(Request $request)
    {
        $activeTab = $request->query('tab', 'status'); 
        $query = StatusBarang::query();

        if ($request->has(['dateFrom', 'dateTo'])) {
            $dateFrom = $request->dateFrom;
            $dateTo = $request->dateTo . ' 23:59:59';

            $query->whereBetween('kembali_tgl', [$request->dateFrom, $request->dateTo]);
        }

        $status = $query->get();

        $pengembalian = Pengembalian::all();
        $tersedia = BarangTersedia::all();
        return view('laporan.index', compact('pengembalian', 'status', 'tersedia', 'activeTab'));
    }

    public function pengguna()
    {
        $users = User::all();
        return view('laporan.daftar-pengguna', compact('users'));
    }
}
