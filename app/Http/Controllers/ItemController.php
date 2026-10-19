<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(): View
    {
        $items = Item::with('category')->get();

        return view('items.index', compact('items'));
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('items.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ], [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'name.required' => 'Nama barang tidak boleh kosong.',
            'price.required' => 'Harga barang tidak boleh kosong.',
            'price.numeric' => 'Harga barang harus berupa angka.',
            'price.gt' => 'Harga barang harus lebih besar dari nol.',
            'stock.required' => 'Stok barang tidak boleh kosong.',
            'stock.integer' => 'Stok barang harus berupa bilangan bulat.',
            'stock.min' => 'Stok barang tidak boleh negatif.',
        ]);

        Item::create($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(Item $item): View
    {
        $categories = Category::all();

        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item): RedirectResponse
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'gt:0'],
            'stock' => ['required', 'integer', 'min:0'],
        ], [
            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'name.required' => 'Nama barang tidak boleh kosong.',
            'price.required' => 'Harga barang tidak boleh kosong.',
            'price.numeric' => 'Harga barang harus berupa angka.',
            'price.gt' => 'Harga barang harus lebih besar dari nol.',
            'stock.required' => 'Stok barang tidak boleh kosong.',
            'stock.integer' => 'Stok barang harus berupa bilangan bulat.',
            'stock.min' => 'Stok barang tidak boleh negatif.',
        ]);

        $item->update($validated);

        return redirect()->route('items.index')->with('success', 'Barang berhasil diubah.');
    }

    public function destroy(Item $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}
