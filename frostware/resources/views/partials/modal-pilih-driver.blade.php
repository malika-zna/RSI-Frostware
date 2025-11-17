<!-- Modal Pilih Driver -->
<div x-show="showDriverModal"
     style="display: none;"
     x-transition:enter="ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center p-4">

    <!-- Latar belakang overlay -->
    <div @click="showDriverModal = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

    <!-- Konten Modal -->
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-auto z-10"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95">

        <div class="p-6">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900">Pilih Driver</h3>
                <button @click="showDriverModal = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Body Modal (Daftar Driver) -->
            <!-- Modal Pilih Truk -->
<div x-show="showTrukModal"
     style="display: none;"
     x-transition:enter="ease-out duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="ease-in duration-200"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-50 flex items-center justify-center p-4">

    <!-- Latar belakang overlay -->
    <div @click="showTrukModal = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

    <!-- Konten Modal -->
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-auto z-10"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 transform scale-95"
         x-transition:enter-end="opacity-100 transform scale-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 transform scale-100"
         x-transition:leave-end="opacity-0 transform scale-95">

        <div class="p-6">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-900">Pilih Truk</h3>
                <button @click="showTrukModal = false" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            <!-- Body Modal (Daftar Truk) -->
            <div class="space-y-3">

                @forelse($truks as $truk)
                    <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                        {{--
                          Saya berasumsi Model Aset punya atribut 'nama'.
                          Jika tidak, ganti $truk->nama dengan atribut yang sesuai
                          (misal: $truk->tipe atau $truk->nomorPolisi)
                        --}}
                        <span class="text-lg text-gray-800">{{ $truk->nama ?? "Truk ID: $truk->id" }}</span>

                        {{--
                          TODO: Anda bisa menambahkan logika ketersediaan truk di sini.
                        --}}

                        <button
                            {{-- Panggil fungsi Alpine 'assignTruk' saat diklik --}}
                            @click="assignTruk({{ $truk->id }})"
                            class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-700">
                            Pilih
                        </button>
                    </div>
                @empty
                    <div class="text-gray-500 text-center py-4">
                        Tidak ada truk yang terdaftar atau tersedia.
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
