<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return response()->json([
            'status'  => 'success',
            'data'    => $produks,
        ]);
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
            $file     = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $produk = Produk::create($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Produk berhasil ditambahkan.',
            'data'    => $produk,
        ], 201);
    }

    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data'   => $produk,
        ]);
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
            $file     = $request->file('foto');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $namaFile);
            $data['foto'] = $namaFile;
        }

        $produk->update($data);

        return response()->json([
            'status'  => 'success',
            'message' => 'Produk berhasil diperbarui.',
            'data'    => $produk,
        ]);
    }

    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->foto && file_exists(public_path('uploads/' . $produk->foto))) {
            unlink(public_path('uploads/' . $produk->foto));
        }

        $produk->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Produk berhasil dihapus.',
        ]);
    }
}
