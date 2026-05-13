<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;

class KendaraanController extends Controller
{
    // TAMPIL DATA (READ)
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('kendaraan.index', compact('kendaraans'));
    }

    // TAMPIL FORM CREATE
    public function create()
    {
        return view('kendaraan.create');
    }

    // SIMPAN DATA (CREATE)
    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required',
            'nama_pemilik' => 'required',
            'merk_kendaraan' => 'required',
            'keluhan' => 'required',
        ]);

        Kendaraan::create($request->all());

        return redirect('/kendaraan')->with('success', 'Data berhasil ditambahkan');
    }
}