<div x-show="showTrukModal"
     style="display: none;"
     class="fixed inset-0 z-50 flex items-center justify-center p-4">

    <div @click="showTrukModal = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

    <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-auto z-10 p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-900">Pilih Truk</h3>
            <button @click="showTrukModal = false" class="text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div class="space-y-3 max-h-96 overflow-y-auto">
            @foreach($truks as $trukItem)
                @php
                    $isUnavailable = $trukItem->status != 'Tersedia';
                @endphp
                <div class="flex justify-between items-center border-b border-gray-200 pb-3">
                    <div>
                        <span class="text-lg text-gray-800 block">{{ $trukItem->nama }}</span>
                        <span class="text-xs text-gray-500">{{ $trukItem->platNomor }} ({{ $trukItem->kapasitas }} Balok)</span>
                    </div>

                    @if($isUnavailable)
                        <button disabled class="px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 rounded-lg cursor-not-allowed">
                            {{ $trukItem->status }}
                        </button>
                    @else
                        <form method="POST" :action="'/pesanan/' + selectedOrderId + '/tugaskan'">
                            @csrf
                            <input type="hidden" name="idTruk" value="{{ $trukItem->idTruk }}">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-700">
                                Pilih
                            </button>
                        </form>
                    @endif
                </div>
            @endforeach

            @if($truks->isEmpty())
                <p class="text-center text-gray-500 py-4">Tidak ada data truk.</p>
            @endif
        </div>
    </div>
</div>
