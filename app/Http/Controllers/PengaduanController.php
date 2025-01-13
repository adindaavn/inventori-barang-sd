<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::all();
        return view('pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $masyarakat = Masyarakat::all();
        return view('pengaduan.create', compact('masyarakat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto       = $request->file('foto');
        $filename   = date('Y-m-d').$foto->getClientOriginalName();
        $path       = 'foto/'.$filename;

        Storage::disk('public')->put($path, file_get_contents($foto));
        
        $data = $request->all();
        $data['foto'] = $filename;
        
        Pengaduan::create($data);
        return redirect()->route('pengaduan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        $masyarakat = Masyarakat::all();
        return view('pengaduan.edit', compact('pengaduan', 'masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        if ($request->old_foto) {
            Storage::disk('public')->delete('foto/'.$request->old_foto);
        }
    
        $foto       = $request->file('foto');
        $filename   = date('Y-m-d').$foto->getClientOriginalName();
        $path       = 'foto/'.$filename;
            
        Storage::disk('public')->put($path, file_get_contents($foto));
            
        $data = $request->all();
        $data['foto'] = $filename;
        $pengaduan->update($data);
        return redirect()->route('pengaduan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if ($pengaduan->foto) {
            Storage::disk('public')->delete('foto/'.$pengaduan->foto);
        }
        $pengaduan->delete();
        return redirect()->route('pengaduan.index');
    }
}
