@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <h2>Buat Pesanan Baru</h2>

    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal Kirim</label>
            <input type="date" name="tanggalKirim" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Alamat Pengiriman</label>
            <textarea name="alamatKirim" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Jumlah Balok</label>
            <input type="number" name="jumlahBalok" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn-primary">Simpan Pesanan</button>
        <a href="{{ route('dashboard.pelanggan') }}" class="btn-secondary">Kembali</a>
    </form>
</div>
@endsection
