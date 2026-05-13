@extends('layouts.app')

@section('content')

<h2>Tambah Kendaraan</h2>

<form action="/kendaraan" method="POST">

    @csrf

    <div class="mb-3">
        <label>Plat Nomor</label>
        <input type="text" name="plat_nomor" class="form-control">
    </div>

    <div class="mb-3">
        <label>Nama Pemilik</label>
        <input type="text" name="nama_pemilik" class="form-control">
    </div>

    <div class="mb-3">
        <label>Merk Kendaraan</label>
        <input type="text" name="merk_kendaraan" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keluhan</label>
        <textarea name="keluhan" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success">
        Simpan
    </button>

    <a href="/kendaraan" class="btn btn-secondary">
        Kembali
    </a>

</form>

@endsection