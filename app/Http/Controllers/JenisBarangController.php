<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisBarang::all();
        return view('jenis-barang.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jns_brg_nama' => 'required|string|max:50'
        ]
        );

        $validated['jns_brg_nama'] = strtoupper($validated['jns_brg_nama']);

        JenisBarang::create($validated);
        return redirect()->route('jenis-barang.index')->with('success', 'Jenis Barang added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisBarang $jenis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisBarang $jenis)
    {
        return view('jenis-barang.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisBarang $jenis)
    {
        $validated = $request->validate(
            [
                'jns_brg_nama' => 'required|string|max:50'
            ]
        );

        $validated['jns_brg_nama'] = strtoupper($validated['jns_brg_nama']);
        
        $jenis->update($validated);
        return redirect()->route('jenis-barang.index')->with('success', 'Jenis Barang updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kode)
    {

        $jenis = JenisBarang::where('jns_brg_kode', $kode)->first();

        if (!$jenis) {
            return redirect()->route('jenis-barang.index')->with('error', 'Jenis Barang not found.');
        }

        try {
            // Attempt to delete the record
            $jenis->delete();
            // Redirect with success message
            return redirect()->route('jenis-barang.index')->with('success', 'Jenis Barang deleted successfully.');
        } catch (\Exception $e) {
            // Handle exceptions, such as database constraints (e.g., foreign key violations)
            return redirect()->route('jenis-barang.index')->with('error', 'Failed to delete Jenis Barang : ' . $e->getMessage());
        }
    }
}
