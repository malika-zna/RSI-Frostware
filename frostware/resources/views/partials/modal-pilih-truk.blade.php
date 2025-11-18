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
                <!-- Truk 1 -->
                <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <span class="text-lg text-gray-800">Mitsubishi L300</span>
                    <button @click="showTrukModal = false" class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-700">
                        Pilih
                    </button>
                </div>
                <!-- Truk 2 -->
                <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <span class="text-lg text-gray-800">Bugati Chiron</span>
                    <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                        Tidak Tersedia
                    </button>
                </div>
                <!-- Truk 3 -->
                <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <span class="text-lg text-gray-800">Mitsubishi Fuso</span>
                    <button class="px-4 py-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-lg cursor-not-allowed" disabled>
                        Tidak Tersedia
                    </button>
                </div>
                <!-- Truk 4 -->
                <div class="flex justify-between items-center pb-2">
                    <span class="text-lg text-gray-800">Toyota Hilux</span>
                    <button @click="showTrukModal = false" class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-700">
                        Pilih
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
