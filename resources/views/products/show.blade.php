<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
                        Detail Produk
                    </h3>

                    <div class="space-y-4">

                        <div>
                            <p class="text-sm text-gray-500">Nama Produk</p>
                            <p class="font-medium">{{ $product->name }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Kategori</p>
                            <p class="font-medium">{{ $product->category }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Harga</p>
                            <p class="font-medium">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Stok</p>
                            <p class="font-medium">{{ $product->stock }}</p>
                        </div>

                    </div>

                    <div class="flex gap-2 mt-6">
                        <a href="{{ route('products.edit', $product) }}"
                           class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                            Edit
                        </a>

                        <a href="{{ route('products.index') }}"
                           class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                            Kembali
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>