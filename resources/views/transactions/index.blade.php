<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Transactions
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
                            Daftar Transaksi
                        </h3>

                        <a href="{{ route('transactions.create') }}"
                           class="px-4 py-2 bg-gray-800 text-white
                                  rounded-md hover:bg-gray-700">
                            + Transaksi Baru
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
                                        Invoice
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Produk
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Jumlah
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Total
                                    </th>

                                    <th class="px-4 py-3 text-left border-r border-gray-200">
                                        Pembayaran
                                    </th>

                                    <th class="px-4 py-3 text-left">
                                        Kasir
                                    </th>

                                </tr>
                            </thead>

                            <tbody>

                                @forelse($transactions as $transaction)

                                    <tr class="border-b border-gray-200">

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $transaction->invoice_number }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $transaction->product->name }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            {{ $transaction->quantity }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            Rp {{ number_format($transaction->total_price, 0, ',', '.') }}
                                        </td>

                                        <td class="px-4 py-3 border-r border-gray-200">
                                            Rp {{ number_format($transaction->payment, 0, ',', '.') }}
                                        </td>

                                        <td class="px-4 py-3">
                                            {{ $transaction->user->name }}
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7"
                                            class="px-4 py-6 text-center text-gray-500">
                                            Belum ada transaksi.
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