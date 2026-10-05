<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="text-lg font-semibold mb-6">
                        Tambah Produk
                    </h3>

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-1">
                                Nama Produk
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm"
                                   required>

                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-1">
                                Kategori
                            </label>

                            <input type="text"
                                   name="category"
                                   value="{{ old('category') }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm"
                                   required>

                            @error('category')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700 mb-1">
                                Harga
                            </label>

                            <input type="number"
                                   name="price"
                                   value="{{ old('price') }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm"
                                   min="0"
                                   required>

                            @error('price')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label class="block font-medium text-sm text-gray-700 mb-1">
                                Stok
                            </label>

                            <input type="number"
                                   name="stock"
                                   value="{{ old('stock') }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm"
                                   min="0"
                                   required>

                            @error('stock')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex gap-2">
                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Simpan
                            </button>

                            <a href="{{ route('products.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>