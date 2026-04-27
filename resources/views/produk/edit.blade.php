@extends('layout')

@section('content')

<h1>Edit Produk</h1>

<a href="{{ route('produk.index') }}" class="btn" style="margin-bottom:16px; display:inline-block;">Kembali</a>

<form action="{{ route('produk.update', $produk->id_produk) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" maxlength="100">
        @error('nama_produk') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Kategori</label>
        <input type="text" name="kategori" value="{{ old('kategori', $produk->kategori) }}" maxlength="50">
        @error('kategori') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" min="0">
        @error('harga') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ old('stok', $produk->stok) }}" min="0">
        @error('stok') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        @error('deskripsi') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-group">
        <label>Foto Produk</label>
        @if($produk->foto)
            <p style="margin-bottom:6px;">
                <img src="{{ asset('uploads/' . $produk->foto) }}" width="80" height="60" style="object-fit:cover;">
                <br><small>Foto saat ini. Upload baru untuk mengganti.</small>
            </p>
        @endif
        <input type="file" name="foto" accept="image/*">
        @error('foto') <div class="error">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Perbarui</button>
</form>

@endsection
