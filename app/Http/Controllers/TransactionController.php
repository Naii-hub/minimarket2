<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['product', 'user'])
            ->latest()
            ->get();

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::where('stock', '>', 0)
            ->orderBy('name')
            ->get();

        return view('transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'payment' => 'required|numeric|min:0',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock) {
            return back()
                ->withInput()
                ->withErrors([
                    'quantity' => 'Jumlah pembelian melebihi stok yang tersedia.'
                ]);
        }

        $totalPrice = $product->price * $request->quantity;

        if ($request->payment < $totalPrice) {
            return back()
                ->withInput()
                ->withErrors([
                    'payment' => 'Pembayaran kurang dari total harga.'
                ]);
        }

        $change = $request->payment - $totalPrice;

        $transaction = Transaction::create([
            'invoice_number' => 'INV-' . date('YmdHis') . '-' . strtoupper(Str::random(4)),
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'payment' => $request->payment,
            'change' => $change,
            'user_id' => auth()->id(),
        ]);

        $product->decrement('stock', $request->quantity);

        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaksi berhasil disimpan.');
    }
}