@extends('layouts.app')

@section('title', 'Tugas Pengiriman Saya')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Tugas Pengiriman Saya</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat Pengiriman</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tgl Kirim</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Truk</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
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
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pesanan->tanggalKirim->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    {{ $pesanan->truk->nama ?? 'Truk ' . $pesanan->idAset }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($pesanan->status == 'Siap Dikirim')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Siap Dikirim
                                        </span>
                                    @elseif($pesanan->status == 'Sedang Dikirim')
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Sedang Dikirim
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($pesanan->status == 'Siap Dikirim')
                                        <button class="px-4 py-1.5 text-xs font-medium text-white bg-green-600 rounded-md hover:bg-green-700">
                                            Mulai Kirim
                                        </button>
                                    @elseif($pesanan->status == 'Sedang Dikirim')
                                        <button class="px-4 py-1.5 text-xs font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700">
                                            Selesaikan
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center">
                                    <div class="text-lg text-gray-500">
                                        Tidak ada tugas pengiriman untuk Anda saat ini.
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
@endsection
