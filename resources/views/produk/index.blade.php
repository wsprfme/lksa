@extends('layout')

@section('content')

<h1>Daftar Produk</h1>

@if(session('sukses'))
    <div class="alert-sukses">{{ session('sukses') }}</div>
@endif

<p style="margin-bottom:14px;">
    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
</p>

<table>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Kategori</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Foto</th>
        <th>Aksi</th>
    </tr>
    @forelse($produks as $i => $produk)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $produk->nama_produk }}</td>
        <td>{{ $produk->kategori }}</td>
        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
        <td>{{ $produk->stok }}</td>
        <td>
            @if($produk->foto)
                <img src="{{ asset('uploads/' . $produk->foto) }}" width="60" height="45" style="object-fit:cover;">
            @else
                -
            @endif
        </td>
        <td>
            <a href="{{ route('produk.show', $produk->id_produk) }}" class="btn">Detail</a>
            <a href="{{ route('produk.edit', $produk->id_produk) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('produk.destroy', $produk->id_produk) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7" style="text-align:center;">Belum ada produk.</td>
    </tr>
    @endforelse
</table>

@endsection
