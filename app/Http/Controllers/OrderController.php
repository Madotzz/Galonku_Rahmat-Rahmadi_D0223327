<?php

namespace App\Http\Controllers;

use App\Models\{Order, Product, Transaction};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create() {
        return view('orders.create', ['products' => Product::all()]);
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $product = Product::lockForUpdate()->find($request->product_id);

            if ($product->stock < $request->quantity) {
                return back()->with('error', 'Stok tidak cukup');
            }

            $product->stock -= $request->quantity;
            $product->save();

            $order = Order::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'status' => 'pending',
            ]);

            Transaction::create([
                'order_id' => $order->id,
                'amount' => $product->price * $request->quantity,
                'status' => 'unpaid',
            ]);

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Order berhasil');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan');
        }
    }

    public function cancel(Order $order) {
        if (Auth::user()->role !== 'admin' && $order->user_id !== Auth::id()) {
            abort(403);
        }

        if (!in_array($order->status, ['pending', 'on_the_way'])) {
            return back()->with('error', 'Tidak dapat dibatalkan');
        }

        DB::beginTransaction();
        try {
            $order->product->increment('stock', $order->quantity);
            $order->update(['status' => 'canceled']);
            $order->transaction->update(['status' => 'canceled']);
            DB::commit();
            return back()->with('success', 'Order dibatalkan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membatalkan');
        }
    }
}