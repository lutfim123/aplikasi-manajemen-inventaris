@extends('layouts.app')

@section('title', 'Daftar Barang - Toko Komputer')

@section('content')
<div class="page-header">
    <h2>Daftar Barang</h2>
    <a href="{{ route('items.create') }}" class="btn btn-primary">+ Tambah Barang</a>
</div>

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th style="width: 150px; text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? '-' }}</td>
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ $item->stock }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('items.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; color: #888;">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection