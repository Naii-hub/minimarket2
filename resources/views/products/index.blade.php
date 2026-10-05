<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold">
                            Daftar Produk
                        </h3>

                        <a href="{{ route('products.create') }}"
                           class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-700">
                            + Tambah Produk
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border px-4 py-3 text-left">No</th>
                                    <th class="border px-4 py-3 text-left">Nama Produk</th>
                                    <th class="border px-4 py-3 text-left">Kategori</th>
                                    <th class="border px-4 py-3 text-left">Harga</th>
                                    <th class="border px-4 py-3 text-left">Stok</th>
                                    <th class="border px-4 py-3 text-left">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="border px-4 py-3">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="border px-4 py-3">
                                            {{ $product->name }}
                                        </td>

                                        <td class="border px-4 py-3">
                                            {{ $product->category }}
                                        </td>

                                        <td class="border px-4 py-3">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>

                                        <td class="border px-4 py-3">
                                            {{ $product->stock }}
                                        </td>

                                        <td class="border px-4 py-3">
                                            <div class="flex gap-2">

                                                <a href="{{ route('products.show', $product) }}"
                                                   class="px-3 py-1 bg-gray-500 text-white rounded hover:bg-gray-600">
                                                    Detail
                                                </a>

                                                <a href="{{ route('products.edit', $product) }}"
                                                   class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>

                                                <form action="{{ route('products.destroy', $product) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                                        Hapus
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="border px-4 py-6 text-center text-gray-500">
                                            Belum ada data produk.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>