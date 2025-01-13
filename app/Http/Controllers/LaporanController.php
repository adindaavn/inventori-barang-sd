<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $barang = BarangInventaris::all();
        $pengembalian = Pengembalian::all();
        return view('laporan.index', compact('barang', 'pengembalian'));
    }
}
