<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Sampah;
use Illuminate\Http\Request;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $sampahs = Sampah::latest()->get(); // Mengambil data Sampah dari database
            return view('sampah.index', compact('sampahs'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sampah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_sampah' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'harga' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('/sampah/create')
                ->withErrors($validator)
                ->withInput();
        }
        
        if ($request->hasFile('foto')) {
            $namaFile = 'img_' . time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images', $namaFile);
        } else {
            $namaFile = '';
        }
        
        $harga = str_replace(['Rp', '.', ','], '', $request->harga);
        $harga = (double) $harga;
        
        Sampah::create([
            'nama_sampah' => $request->nama_sampah,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFile,
            'harga' => $harga,
        ]);
        
        return redirect('/sampah')->with('pesan','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sampah $sampah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sampah $sampah)
    {
        return view('sampah.edit', compact('sampah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sampah $sampah)
    {
        $validator = Validator::make($request->all(), [
            'nama_sampah' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'harga' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect('/sampah/' . $sampah->id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }
    
        if ($request->hasFile('foto')) {
            $namaFile = 'img_' . time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images', $namaFile);
        } else {
            $namaFile = $sampah->foto;
        }
    
        $harga = str_replace(['Rp', '.', ','], '', $request->harga);
        $harga = (double) $harga;
    
        $sampah->update([
            'nama_sampah' => $request->nama_sampah,
            'deskripsi' => $request->deskripsi,
            'foto' => $namaFile,
            'harga' => $harga,
        ]);
    
        return redirect('/sampah')->with('pesan', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sampah $sampah)
    {
        $sampah->delete();
        return redirect('sampah')->with('pesan', 'Data berhasil dihapus');
    }
}
