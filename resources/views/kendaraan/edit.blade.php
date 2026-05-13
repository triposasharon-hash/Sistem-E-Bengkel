@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header bg-warning">
        <h5 class="mb-0">✏️ EDIT DATA KENDARAAN</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="plat_nomor" class="form-label">PLAT NOMOR <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('plat_nomor') is-invalid @enderror" 
                       id="plat_nomor" name="plat_nomor" value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}" 
                       placeholder="Contoh: BK 1234 XX" required>
                @error('plat_nomor')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_pemilik" class="form-label">NAMA PEMILIK <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" 
                       id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}" 
                       placeholder="Masukkan nama pemilik" required>
                @error('nama_pemilik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="merk_kendaraan" class="form-label">MERK KENDARAAN <span class="text-danger">*</span></label>
                <select class="form-control @error('merk_kendaraan') is-invalid @enderror" 
                        id="merk_kendaraan" name="merk_kendaraan" required>
                    <option value="">Pilih Merk</option>
                    <option value="Honda" {{ old('merk_kendaraan', $kendaraan->merk_kendaraan) == 'Honda' ? 'selected' : '' }}>Honda</option>
                    <option value="Yamaha" {{ old('merk_kendaraan', $kendaraan->merk_kendaraan) == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                    <option value="Toyota" {{ old('merk_kendaraan', $kendaraan->merk_kendaraan) == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                    <option value="Suzuki" {{ old('merk_kendaraan', $kendaraan->merk_kendaraan) == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                    <option value="Daihatsu" {{ old('merk_kendaraan', $kendaraan->merk_kendaraan) == 'Daihatsu' ? 'selected' : '' }}>Daihatsu</option>
                </select>
                @error('merk_kendaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keluhan" class="form-label">KELUHAN <span class="text-danger">*</span></label>
                <textarea class="form-control @error('keluhan') is-invalid @enderror" 
                          id="keluhan" name="keluhan" rows="3" 
                          placeholder="Jelaskan kerusakan kendaraan" required>{{ old('keluhan', $kendaraan->keluhan) }}</textarea>
                @error('keluhan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">KEMBALI</a>
                <button type="submit" class="btn btn-primary">🔄 UPDATE DATA</button>
            </div>
        </form>
    </div>
</div>
@endsection