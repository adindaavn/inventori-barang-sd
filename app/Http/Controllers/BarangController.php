<?php

namespace App\Http\Controllers;

use App\Models\BarangInventaris;
use App\Models\JenisBarang;
use App\Models\TmUser;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = BarangInventaris::all();
        return view('barang.index', compact('barang'));
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
        BarangInventaris::create($request->all());
        return redirect()->route('barang.index');
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
        $barang->update($request->all());
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangInventaris $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
