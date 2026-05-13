@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0">📋 DAFTAR SERVIS KENDARAAN</h5>
        <a href="{{ route('kendaraan.create') }}" class="btn btn-light btn-sm">➕ TAMBAH KENDARAAN</a>
    </div>
    <div class="card-body">
        @if($kendaraans->isEmpty())
            <div class="alert alert-warning text-center">
                Belum ada data kendaraan. Silakan tambah data baru.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">NO</th>
                            <th width="15%">PLAT NOMOR</th>
                            <th width="20%">NAMA PEMILIK</th>
                            <th width="15%">MERK</th>
                            <th width="30%">KELUHAN</th>
                            <th width="15%">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kendaraans as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td><strong>{{ $item->plat_nomor }}</strong></td>
                            <td>{{ $item->nama_pemilik }}</td>
                            <td>{{ $item->merk_kendaraan }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td class="text-center">
                                <!-- TOMBOL EDIT -->
                                <a href="{{ route('kendaraan.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    ✏️ EDIT
                                </a>

                                <!-- TOMBOL HAPUS DENGAN KONFIRMASI -->
                                <form action="{{ route('kendaraan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kendaraan {{ $item->plat_nomor }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        🗑️ HAPUS
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection