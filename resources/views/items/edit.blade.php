@extends('layouts.app')

@section('title', 'Edit Barang - Toko Komputer')

@section('content')
<div class="page-header">
    <h2>Edit Data Barang</h2>
    <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
</div>

<div class="card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="form-label">Nama Barang</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $item->name) }}" required autofocus>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category_id" class="form-label">Kategori</label>
            <select id="category_id" name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price" class="form-label">Harga (Rp)</label>
            <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $item->price) }}" min="1" step="any" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock" class="form-label">Jumlah Stok</label>
            <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $item->stock) }}" min="0" step="1" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection