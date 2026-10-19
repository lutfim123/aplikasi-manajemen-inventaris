@extends('layouts.app')

@section('title', 'Daftar Kategori - Toko Komputer')

@section('content')
<div class="page-header">
    <h2>Daftar Kategori</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
</div>

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">ID</th>
                <th>Nama Kategori</th>
                <th>Jumlah Barang</th>
                <th style="width: 150px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->items_count }} barang</td>
                    <td style="text-align: center;">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center; color: #888;">Belum ada data kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection