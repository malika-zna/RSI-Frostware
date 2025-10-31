@extends('layouts.app')

@section('content')
<div class="dashboard-container">

    <div class="dashboard-header">
        <h1>Dashboard Pelanggan</h1>
        <div>
            <span>{{ Auth::user()->nama ?? 'Pelanggan' }}</span> |
            <span>{{ now()->translatedFormat('l, d/m/Y') }}</span>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="dashboard-content">
        <div class="card">
            <h3>Daftar Pesanan Anda</h3>
            <a href="{{ route('pesanan.create') }}" class="btn-primary">+ Buat Pesanan</a>

            <table class="table mt-3">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Tanggal Pesan</th>
                        <th>Tanggal Kirim</th>
                        <th>Jumlah Balok</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesanans as $p)
                        <tr>
                            <td>#{{ $p->idPesanan }}</td>
                            <td>{{ $p->tanggalPesan->format('d/m/Y') }}</td>
                            <td>{{ $p->tanggalKirim ? $p->tanggalKirim->format('d/m/Y') : '-' }}</td>
                            <td>{{ $p->jumlahBalok }}</td>
                            <td>
                                <span class="status-badge 
                                    {{ $p->status == 'Belum Diverifikasi' ? 'status-belum' :
                                       ($p->status == 'Diterima' ? 'status-diterima' : 'status-ditolak') }}">
                                    {{ $p->status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">Belum ada pesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
