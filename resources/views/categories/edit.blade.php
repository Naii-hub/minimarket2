<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-lg p-6">

                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-2">
                            Nama Kategori
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ old('name', $category->name) }}"
                               class="w-full border-gray-300 rounded-md"
                               required>
                    </div>

                    <div class="mb-6">
                        <label class="block font-medium text-sm text-gray-700 mb-2">
                            Deskripsi
                        </label>

                        <textarea name="description"
                                  rows="4"
                                  class="w-full border-gray-300 rounded-md">{{ old('description', $category->description) }}</textarea>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded">
                            Simpan Perubahan
                        </button>

                        <a href="{{ route('categories.index') }}"
                           class="px-4 py-2 bg-gray-200 rounded">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>