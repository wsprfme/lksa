<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:100',
            'kategori'    => 'required|max:50',
            'harga'       => 'required|integer',
            'stok'        => 'required|integer',
            'deskripsi'   => 'required',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'harga', 'stok', 'deskripsi']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        Produk::create($data);

        return redirect()->route('produk.index')->with('sukses', 'Produk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required|max:100',
            'kategori'    => 'required|max:50',
            'harga'       => 'required|integer',
            'stok'        => 'required|integer',
            'deskripsi'   => 'required',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['nama_produk', 'kategori', 'harga', 'stok', 'deskripsi']);

        if ($request->hasFile('foto')) {
            if ($produk->foto && file_exists(public_path('uploads/' . $produk->foto))) {
                unlink(public_path('uploads/' . $produk->foto));
            }
            $file = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $produk->update($data);

        return redirect()->route('produk.index')->with('sukses', 'Produk berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto && file_exists(public_path('uploads/' . $produk->foto))) {
            unlink(public_path('uploads/' . $produk->foto));
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('sukses', 'Produk berhasil dihapus.');
    }
}
