@extends('layouts.app')

@section('title', 'Kelola Pengiriman')

@section('content')
<div x-data="{
    showDriverModal: false,
    showTrukModal: false,
    selectedOrderId: null
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pesanan Masuk</h2>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat Pengiriman</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Pesan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Kirim</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Driver</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Truk</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @forelse ($pesanans as $pesanan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        ORD{{ str_pad($pesanan->idPesanan, 3, '0', STR_PAD_LEFT) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        <div>{{ $pesanan->pelanggan->nama ?? 'N/A' }}</div>
                                        <div class="text-xs text-gray-500">{{ $pesanan->pelanggan->nomorTelepon ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pesanan->alamatKirim }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pesanan->jumlahBalok }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pesanan->tanggalPesan->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pesanan->tanggalKirim->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                                        @if($pesanan->status == 'Selesai Diproduksi')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                Selesai Produksi
                                            </span>
                                        @elseif($pesanan->status == 'Siap Dikirim')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Siap Dikirim
                                            </span>
                                        @elseif($pesanan->status == 'Sedang Dikirim')
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Sedang Dikirim
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        @if($pesanan->driver)
                                            {{ $pesanan->driver->nama }}
                                        @else
                                            <button @click="showDriverModal = true; selectedOrderId = {{ $pesanan->idPesanan }}" class="px-4 py-1.5 text-xs font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                                                Pilih Driver
                                            </button>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        @if($pesanan->truk)
                                            {{ $pesanan->truk->nama ?? 'Truk ' . $pesanan->idAset }}
                                        @else
                                            <button @click="showTrukModal = true; selectedOrderId = {{ $pesanan->idPesanan }}" class="px-4 py-1.5 text-xs font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700">
                                                Pilih Truk
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-12 text-center">
                                        <div class="text-lg text-gray-500">
                                            Tidak ada pesanan yang perlu dikelola saat ini.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.modal-pilih-driver')
    @include('partials.modal-pilih-truk')
</div>
@endsection
