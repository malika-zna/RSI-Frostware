@extends('layouts.app')

@section('title', 'Kelola Pengiriman')

@section('content')
<!-- State management untuk modal -->
<div x-data="{
    showDriverModal: false,
    showTrukModal: false,
    selectedOrderId: null
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Card Utama -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Pesanan Masuk</h2>

                <!-- Wrapper untuk table agar bisa scroll di layar kecil -->
                <div class="overflow-x-auto">
                    <!-- Tabel Daftar Pesanan -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID Pesanan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelanggan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Alamat Pengiriman</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Pesan</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Kirim</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Driver</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Truk</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Baris 1: ORD001 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <div>Budi Santoso</div>
                                    <div class="text-xs text-gray-500">089765432100</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Jl. Budi Sutomo No.50, Lamongan, Jawa Timur</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">120</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">15/09/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">25/10/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Belum Dikirim
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button @click="showDriverModal = true; selectedOrderId = 'ORD001'" class="px-4 py-1.5 text-xs font-medium text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        Pilih Driver
                                    </button>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button @click="showTrukModal = true; selectedOrderId = 'ORD001'" class="px-4 py-1.5 text-xs font-medium text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                        Pilih Truk
                                    </button>
                                </td>
                            </tr>

                            <!-- Baris 2: ORD002 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <div>AyuKemala Sari</div>
                                    <div class="text-xs text-gray-500">089765432101</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Jl. Jakarta No.150, Ngawi</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">450</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">15/09/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">25/10/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Pesanan Diterima
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Dodo Mulyono</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Mitsubishi Fuso</td>
                            </tr>

                            <!-- Baris 3: ORD003 -->
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">ORD003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                    <div>Citra Bunga</div>
                                    <div class="text-xs text-gray-500">089765432102</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Jl. Bandung No.245, Probolinggo</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">360</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">15/09/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">25/10/2025</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-200 text-gray-800">
                                        Sedang Dikirim
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Jaka Supratno</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Bugati Chiron</td>
                            </tr>

                            <!-- Tambahkan baris lain sesuai kebutuhan -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Modal Partials -->
    @include('partials.modal-pilih-driver')
    @include('partials.modal-pilih-truk')

</div>
@endsection
