<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transaksi Baru
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <h3 class="text-xl font-semibold text-gray-800 mb-6">
                        Tambah Transaksi
                    </h3>

                    @if($errors->any())
                        <div class="mb-6 p-4 bg-red-100 border border-red-200
                                    text-red-700 rounded">

                            <ul class="list-disc list-inside">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        </div>
                    @endif

                    <form action="{{ route('transactions.store') }}"
                          method="POST">

                        @csrf

                        <div class="mb-4">

                            <label for="product_id"
                                   class="block text-sm font-medium
                                          text-gray-700 mb-2">
                                Produk
                            </label>

                            <select name="product_id"
                                    id="product_id"
                                    class="w-full border-gray-300
                                           rounded-md shadow-sm"
                                    required>

                                <option value="">
                                    -- Pilih Produk --
                                </option>

                                @foreach($products as $product)

                                    <option value="{{ $product->id }}"
                                            data-price="{{ $product->price }}"
                                            data-stock="{{ $product->stock }}"
                                            {{ old('product_id') == $product->id ? 'selected' : '' }}>

                                        {{ $product->name }}
                                        - Rp {{ number_format($product->price, 0, ',', '.') }}
                                        (Stok: {{ $product->stock }})

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        <div class="mb-4">

                            <label for="quantity"
                                   class="block text-sm font-medium
                                          text-gray-700 mb-2">
                                Jumlah
                            </label>

                            <input type="number"
                                   name="quantity"
                                   id="quantity"
                                   value="{{ old('quantity', 1) }}"
                                   min="1"
                                   class="w-full border-gray-300
                                          rounded-md shadow-sm"
                                   required>

                            <p id="stock-info"
                               class="text-sm text-gray-500 mt-1">
                            </p>

                        </div>

                        <div class="mb-4">

                            <label for="total"
                                   class="block text-sm font-medium
                                          text-gray-700 mb-2">
                                Total Harga
                            </label>

                            <input type="text"
                                   id="total"
                                   class="w-full border-gray-300
                                          rounded-md shadow-sm bg-gray-100"
                                   value="Rp 0"
                                   readonly>

                        </div>

                        <div class="mb-6">

                            <label for="payment"
                                   class="block text-sm font-medium
                                          text-gray-700 mb-2">
                                Pembayaran
                            </label>

                            <input type="number"
                                   name="payment"
                                   id="payment"
                                   value="{{ old('payment') }}"
                                   min="0"
                                   class="w-full border-gray-300
                                          rounded-md shadow-sm"
                                   required>

                        </div>

                        <div class="flex items-center gap-3">

                            <a href="{{ route('transactions.index') }}"
                               class="px-4 py-2 bg-gray-200 text-gray-700
                                      rounded-md hover:bg-gray-300">
                                Kembali
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-gray-800 text-white
                                           rounded-md hover:bg-gray-700">
                                Simpan Transaksi
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>

        const productSelect = document.getElementById('product_id');
        const quantityInput = document.getElementById('quantity');
        const totalInput = document.getElementById('total');
        const stockInfo = document.getElementById('stock-info');

        function updateTotal() {

            const selectedOption =
                productSelect.options[productSelect.selectedIndex];

            const price =
                selectedOption.dataset.price || 0;

            const stock =
                selectedOption.dataset.stock || 0;

            const quantity =
                quantityInput.value || 0;

            const total =
                price * quantity;

            totalInput.value =
                'Rp ' + new Intl.NumberFormat('id-ID').format(total);

            if (selectedOption.value) {
                stockInfo.textContent =
                    'Stok tersedia: ' + stock;
            } else {
                stockInfo.textContent = '';
            }
        }

        productSelect.addEventListener('change', updateTotal);
        quantityInput.addEventListener('input', updateTotal);

        updateTotal();

    </script>

</x-app-layout>