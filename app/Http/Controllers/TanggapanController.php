<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Petugas;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tanggapan = Tanggapan::all();
        return view('tanggapan.index', compact('tanggapan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengaduan = Pengaduan::all();
        $petugas = Petugas::all();
        return view('tanggapan.create', compact('pengaduan','petugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Tanggapan::create($request->all());
        return redirect()->route('tanggapan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tanggapan $tanggapan)
    {
        $pengaduan = Pengaduan::all();
        $petugas = Petugas::all();
        return view('tanggapan.edit', compact('tanggapan','pengaduan','petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tanggapan $tanggapan)
    {
        $tanggapan->update($request->all());
        return redirect()->route('tanggapan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tanggapan $tanggapan)
    {
        $tanggapan->delete();
        return redirect()->route('tanggapan.index');
    }
}
