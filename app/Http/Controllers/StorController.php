<?php

namespace App\Http\Controllers;

use App\Models\Stor;
use App\Models\Sampah;
use Illuminate\Http\Request;

class StorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stors = Stor::latest()->get(); // Mengambil data Sampah dari database
        return view('stor_sampah.index', compact('stors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stor_sampah.create',[
            'sampahs'=>Sampah::all(),
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'sampah_id' => 'required',
            'jumlah' => 'required',
            'status' => 'nullable',
        ]);
    
        $jenisSampah = Sampah::find($request->sampah_id);
    
        // Hitung total harga
        $totalHarga = $jenisSampah->harga * $request->jumlah;
    
        // Simpan data penjualan sampah, termasuk total harga
        Stor::create([
            'nama' => $request->nama,
            'sampah_id' => $request->sampah_id,
            'jumlah' => $request->jumlah,
            'total' => $totalHarga,
            'status' => $request->status,
        ]);
    
        return redirect('/stor')->with('pesan', 'Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stor $stor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stor $stor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stor $stor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stor $stor)
    {
        //
    }
}
