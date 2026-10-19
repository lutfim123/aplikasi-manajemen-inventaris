@extends('layouts.app')

@section('title', 'Edit Kategori - Toko Komputer')

@section('content')
<div class="page-header">
    <h2>Edit Data Kategori</h2>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card" style="max-width: 500px; margin: 0 auto;">
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nama Kategori</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required autofocus>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection