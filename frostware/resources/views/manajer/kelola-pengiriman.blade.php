@extends('layouts.app')

@section('title', 'Kelola Pengiriman')

@section('content')
<div x-data="{
    showDriverModal: false,
    showTrukModal: false,
    selectedOrderId: null,

    // ===== TAMBAHKAN FUNGSI ASSIGN DRIVER =====
    assignDriver(driverId) {
        // Ambil CSRF token (pastikan ada di layout/app.blade.php)
        const token = document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content');

        fetch('{{ route('pengiriman.assignDriver') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                idPesanan: this.selectedOrderId,
                idDriver: driverId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Driver berhasil ditugaskan!');
                location.reload(); // Muat ulang halaman untuk lihat perubahan
            } else {
                alert('Gagal: ' + (data.message || 'Terjadi kesalahan.'));
            }
            this.showDriverModal = false;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan koneksi.');
            this.showDriverModal = false;
        });
    },

    // ===== TAMBAHKAN FUNGSI ASSIGN TRUK =====
    assignTruk(trukId) {
        const token = document.querySelector('meta[name=\"csrf-token\"]').getAttribute('content');

        fetch('{{ route('pengiriman.assignTruk') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                idPesanan: this.selectedOrderId,
                idAset: trukId // Sesuai dengan validasi controller
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Truk berhasil dipilih!');
                location.reload(); // Muat ulang halaman
            } else {
                alert('Gagal: ' + (data.message || 'Terjadi kesalahan.'));
            }
            this.showTrukModal = false;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan koneksi.');
            this.showTrukModal = false;
        });
    }
}">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        </div>

    @include('partials.modal-pilih-driver')
    @include('partials.modal-pilih-truk')
</div>
@endsection
