@extends('layouts.app')

@section('title', 'Tambah Kategori - Toko Komputer')

@section('content')
<div class="page-header">
    <h2>Tambah Kategori Baru</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card" style="max-width: 500px; margin: 0 auto;">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>