<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // TAMPIL SEMUA DATA
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraans'));
    }

    // FORM TAMBAH DATA
    public function create()
    {
        return view('kendaraan.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'nama_pemilik' => 'required',
            'merk_kendaraan' => 'required',
            'keluhan' => 'required',
        ]);

        Kendaraan::create([
            'plat_nomor' => $request->plat_nomor,
            'nama_pemilik' => $request->nama_pemilik,
            'merk_kendaraan' => $request->merk_kendaraan,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // FORM EDIT DATA
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'nama_pemilik' => 'required',
            'merk_kendaraan' => 'required',
            'keluhan' => 'required',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update([
            'plat_nomor' => $request->plat_nomor,
            'nama_pemilik' => $request->nama_pemilik,
            'merk_kendaraan' => $request->merk_kendaraan,
            'keluhan' => $request->keluhan,
        ]);

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil diupdate!');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil dihapus!');
    }
}