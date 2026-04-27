@extends('layout')

@section('content')

<h1>Detail Produk</h1>

<a href="{{ route('produk.index') }}" class="btn" style="margin-bottom:16px; display:inline-block;">Kembali</a>

<table style="width:auto;">
    <tr>
        <td style="padding:8px 12px; font-weight:bold; width:160px;">Nama Produk</td>
        <td style="padding:8px 12px;">{{ $produk->nama_produk }}</td>
    </tr>
    <tr>
        <td style="padding:8px 12px; font-weight:bold; background:#f7f7f7;">Kategori</td>
        <td style="padding:8px 12px; background:#f7f7f7;">{{ $produk->kategori }}</td>
    </tr>
    <tr>
        <td style="padding:8px 12px; font-weight:bold;">Harga</td>
        <td style="padding:8px 12px;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
    </tr>
    <tr>
        <td style="padding:8px 12px; font-weight:bold; background:#f7f7f7;">Stok</td>
        <td style="padding:8px 12px; background:#f7f7f7;">{{ $produk->stok }}</td>
    </tr>
    <tr>
        <td style="padding:8px 12px; font-weight:bold;">Deskripsi</td>
        <td style="padding:8px 12px;">{{ $produk->deskripsi }}</td>
    </tr>
    <tr>
        <td style="padding:8px 12px; font-weight:bold; background:#f7f7f7;">Foto</td>
        <td style="padding:8px 12px; background:#f7f7f7;">
            @if($produk->foto)
                <img src="{{ asset('uploads/' . $produk->foto) }}" width="120" height="90" style="object-fit:cover;">
            @else
                Tidak ada foto
            @endif
        </td>
    </tr>
    <tr>
        <td style="padding:8px 12px; font-weight:bold;">Tanggal Dibuat</td>
        <td style="padding:8px 12px;">{{ $produk->created_at->format('d/m/Y H:i') }}</td>
    </tr>
</table>

@endsection
