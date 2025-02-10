<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use App\Models\JenisBarang;
use App\Models\Peminjaman;
use App\Models\PeminjamanBarang;
use App\Models\TmUser;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jns = JenisBarang::all();
        $barang = BarangInventaris::all();
        return view('barang.index', compact('barang', 'jns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jns = JenisBarang::all();
        $users = TmUser::all();
        return view('barang.create', compact('jns','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jns_brg_kode' => 'required|string|exists:tr_jenis_barang,jns_brg_kode',
            'br_nama' => 'required|string|max:50',
            'br_tgl_terima' => 'required|date',
            'br_sts' => 'required|in:0,1,2,3'
        ]);

        BarangInventaris::create($validated);

        return redirect()->route('barang.index')->with('success', 'Barang Inventaris added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangInventaris $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangInventaris $barang)
    {
        $jns = JenisBarang::all();
        $users = TmUser::all();
        return view('barang.edit', compact('jns', 'users', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangInventaris $barang)
    {
        $validated = $request->validate([
            'jns_brg_kode' => 'required|string|exists:tr_jenis_barang,jns_brg_kode',
            'br_nama' => 'required|string|max:50',
            'br_tgl_terima' => 'required|date',
            'br_sts' => 'required|in:0,1,2,3'
        ]);

        $barang->update($validated);
        return redirect()->route('barang.index')->with('success', 'Barang Inventaris updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode)
    {
        $barang = BarangInventaris::where('br_kode', $kode)->first();

        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Barang Inventaris not found.');
        }

        if (PeminjamanBarang::where('br_kode', $kode)->exists()) {
            return redirect()->route('barang.index')->with('error', 'Barang Inventaris recorded in Peminjaman Barang');
        }

        try {
            $barang->delete();
            return redirect()->route('barang.index')->with('success', 'Barang Inventaris deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('barang.index')->with('error', 'Failed to delete Barang Inventaris : ' . $e->getMessage());
        }
    }

}
