<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Kategori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <div class="mb-4">
                    <p class="text-sm text-gray-500">Nama Kategori</p>
                    <p class="text-lg font-semibold">
                        {{ $category->name }}
                    </p>
                </div>

                <div class="mb-6">
                    <p class="text-sm text-gray-500">Deskripsi</p>
                    <p>
                        {{ $category->description ?? '-' }}
                    </p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('categories.edit', $category) }}"
                       class="px-4 py-2 bg-gray-800 text-white rounded">
                        Edit
                    </a>

                    <a href="{{ route('categories.index') }}"
                       class="px-4 py-2 bg-gray-200 rounded">
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>