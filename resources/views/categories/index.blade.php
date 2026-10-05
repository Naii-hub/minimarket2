<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-200
                            text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">

                    <div class="flex justify-between items-center mb-6">

                        <h3 class="text-xl font-semibold text-gray-800">
                            Daftar Kategori
                        </h3>

                        <a href="{{ route('categories.create') }}"
                           class="px-4 py-2 bg-gray-800 text-white
                                  rounded-md hover:bg-gray-700">
                            + Tambah Kategori
                        </a>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full border border-gray-200">

                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200">

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        No
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Nama Kategori
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Deskripsi
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Jumlah Produk
                                    </th>

                                    <th class="px-4 py-3 text-left">
                                        Aksi
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse($categories as $category)

                                    <tr class="border-b border-gray-200">

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $category->name }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $category->description ?? '-' }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $category->product_count }} Produk
                                        </td>

                                        <td class="px-4 py-3">

                                            <div class="flex gap-2">

                                                <a href="{{ route('categories.show', $category) }}"
                                                   class="px-3 py-1 bg-gray-500 text-white
                                                          rounded hover:bg-gray-600">
                                                    Detail
                                                </a>

                                                <a href="{{ route('categories.edit', $category) }}"
                                                   class="px-3 py-1 bg-yellow-500 text-white
                                                          rounded hover:bg-yellow-600">
                                                    Edit
                                                </a>

                                                <form action="{{ route('categories.destroy', $category) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="px-3 py-1 bg-red-600 text-white
                                                                   rounded hover:bg-red-700">
                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5"
                                            class="px-4 py-6 text-center text-gray-500">
                                            Belum ada kategori.
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