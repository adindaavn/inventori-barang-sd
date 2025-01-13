<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return view('masyarakat.index', compact('masyarakat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masyarakat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Masyarakat::create($request->all());
        return redirect()->route('masyarakat.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Masyarakat $masyarakat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Masyarakat $masyarakat)
    {
        return view('masyarakat.edit', compact('masyarakat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Masyarakat $masyarakat)
    {
        $masyarakat->update($request->all());
        return redirect()->route('masyarakat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Masyarakat $masyarakat)
    {
        $masyarakat->delete();
        return redirect()->route('masyarakat.index');
    }
}
