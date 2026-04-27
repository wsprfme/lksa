@extends('layout')

@section('content')

<h1>Tambah Produk</h1>

<a href="{{ route('produk.index') }}" class="btn" style="margin-bottom:16px; display:inline-block;">Kembali</a>

<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="{{ old('nama_produk') }}" maxlength="100">
        @error('nama_produk') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori') }}" maxlength="50">
        @error('kategori') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" value="{{ old('harga') }}" min="0">
        @error('harga') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ old('stok') }}" min="0">
        @error('stok') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ old('deskripsi') }}</textarea>
        @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Foto Produk</label>
        <input type="file" name="foto" accept="image/*">
        @error('foto') <div class="error">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection
