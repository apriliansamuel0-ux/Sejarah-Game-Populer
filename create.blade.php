@extends('layouts.app')

@section('title', 'Tambah Developer')

@section('content')
<main class="form-container">
    <form class="card card-form" action="{{ route('developer.store') }}" method="POST">
        @csrf
        <h2>Tambah Developer Baru</h2>

        <label for="nama_developer">Nama Developer/Publisher</label>
        <input type="text" name="nama_developer" id="nama_developer" value="{{ old('nama_developer') }}" required>
        @error('nama_developer')
            <p style="font-size: 12px; color: red;">{{ $message }}</p>
        @enderror
        
        <label for="negara">Negara Asal</label>
        <input type="text" name="negara" id="negara" value="{{ old('negara') }}">
        @error('negara')
            <p style="font-size: 12px; color: red;">{{ $message }}</p>
        @enderror
        
        <label for="tahun_berdiri">Tahun Berdiri</label>
        <input type="number" name="tahun_berdiri" id="tahun_berdiri" min="1950" max="{{ date('Y') }}" value="{{ old('tahun_berdiri') }}">
        @error('tahun_berdiri')
            <p style="font-size: 12px; color: red;">{{ $message }}</p>
        @enderror

        <label for="deskripsi">Deskripsi Singkat</label>
        <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi') }}</textarea>
        @error('deskripsi')
            <p style="font-size: 12px; color: red;">{{ $message }}</p>
        @enderror

        <button class="btn" type="submit" style="margin-top: 20px;">Simpan Developer</button>
    </form>
</main>
@endsection