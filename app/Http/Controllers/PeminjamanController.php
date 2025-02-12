<?php

namespace App\Http\Controllers;

use App\Models\BarangDipinjam;
use App\Models\BarangInventaris;
use App\Models\BarangTersedia;
use App\Models\Peminjaman;
use App\Models\PeminjamanBarang;
use App\Models\TrSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $dipinjam = BarangDipinjam::all();
        $peminjaman = Peminjaman::all();
        return view('peminjaman.index', compact('peminjaman', 'dipinjam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = TrSiswa::all();
        $tersedia = BarangTersedia::all();
        $barang = BarangInventaris::all();
        $users = User::all();
        return view('peminjaman.create', compact('users', 'tersedia', 'barang', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pbTgl = $request->input('pb_tgl');
        $pbTgl = str_replace('T', ' ', $pbTgl) . ':00';
        $request->merge(['pb_tgl' => $pbTgl]);

        $pbHrsTgl = $request->input('pb_harus_kembali_tgl');
        $pbHrsTgl = str_replace('T', ' ', $pbHrsTgl) . ':00';
        $request->merge(['pb_harus_kembali_tgl' => $pbHrsTgl]);

        $validated = $request->validate([
            'pb_no_siswa' => 'required|integer',
            'pb_nama_siswa' => 'required|string|max:100',
            'pb_harus_kembali_tgl' => 'required|date_format:Y-m-d H:i:s',
            'br_kode' => 'required|array|min:1',
            'br_kode.*' => 'required|string|exists:tm_barang_inventaris,br_kode'
        ]);

        $peminjaman = Peminjaman::create($validated);
        
        $pb_id = $peminjaman->pb_id;

        foreach ($validated['br_kode'] as $br_kode) {
            PeminjamanBarang::create([
                'pb_id' => $pb_id,
                'br_kode' => $br_kode,
                'pbd_tgl' => $peminjaman->pb_tgl,
                'pbd_sts' => $peminjaman->pb_sts,
            ]);
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        $barang = BarangInventaris::all();
        $users = User::all();
        return view('peminjaman.edit', compact('peminjaman', 'users', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'pb_no_siswa' => 'required|integer',
            'pb_nama_siswa' => 'required|string|max:100',
            'pb_tgl' => 'required|date',
            'pb_harus_kembali_tgl' => 'required|date|after_or_equal:pb_tgl',
            'pb_sts' => 'required|in:0,1',
            'br_kode' => 'required|array|min:1',
            'br_kode.*' => 'required|string|exists:tm_barang_inventaris,br_kode'
        ]);

        $peminjaman->update($validated);

        $pb_id = $peminjaman->pb_id;

        PeminjamanBarang::where('pb_id', $pb_id)->delete();

        foreach ($validated['br_kode'] as $br_kode) {
            PeminjamanBarang::create([
                'pb_id' => $pb_id,
                'br_kode' => $br_kode,
                'pbd_tgl' => $validated['pb_tgl'],
                'pbd_sts' => $validated['pb_sts'],
            ]);
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode)
    {
        $peminjaman = Peminjaman::where('br_kode', $kode)->first();

        if (!$peminjaman) {
            return redirect()->route('barang.index')->with('error', 'Barang Inventaris not found.');
        }

        if (PeminjamanBarang::where('br_kode', $kode)->exists()) {
            return redirect()->route('barang.index')->with('error', 'Barang Inventaris recorded in Peminjaman Barang');
        }

        try {
            $peminjaman->delete();
            return redirect()->route('barang.index')->with('success', 'Barang Inventaris deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Failed to delete Barang Inventaris : ' . $e->getMessage());
        }
    }
}
