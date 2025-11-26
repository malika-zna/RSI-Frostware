<div x-show="showDriverModal"
     style="display: none;"
     class="fixed inset-0 z-50 flex items-center justify-center p-4">

    {{-- Backdrop --}}
    <div @click="showDriverModal = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

    {{-- Modal Content --}}
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-auto z-10 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900">Pilih Driver</h3>
            <button @click="showDriverModal = false" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="space-y-3 max-h-96 overflow-y-auto">
            @foreach($drivers as $driver)
                @php
                    // Menggunakan property pesanan_aktif yang diset manual di Controller
                    // Jika null, berarti driver available
                    $isBusy = !empty($driver->pesanan_aktif);
                @endphp

                <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <div>
                        <span class="text-lg text-gray-800 block">{{ $driver->nama }}</span>
                        <span class="text-xs text-gray-500">{{ $driver->nomorTelepon }}</span>

                        {{-- Tampilkan info pesanan jika sibuk --}}
                        @if($isBusy)
                            <span class="text-xs text-red-500 block mt-1">
                                Sedang mengantar Order #{{ str_pad($driver->pesanan_aktif->idPesanan, 3, '0', STR_PAD_LEFT) }}
                            </span>
                        @else
                            <span class="text-xs text-green-600 block mt-1">Available</span>
                        @endif
                    </div>

                    @if($isBusy)
                        <button disabled class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-lg cursor-not-allowed">
                            Sedang Bertugas
                        </button>
                    @else
                        {{-- Form Action menggunakan AlpineJS binding untuk selectedOrderId --}}
                        <form method="POST" :action="'/pesanan/' + selectedOrderId + '/tugaskan'">
                            @csrf
                            <input type="hidden" name="idDriver" value="{{ $driver->idAkun }}">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-700 transition">
                                Tugaskan
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach

            @if($drivers->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-500">Belum ada data driver.</p>
                </div>
            @endif
        </div>
    </div>
</div>
