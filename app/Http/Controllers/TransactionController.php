<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function updateStatus(Request $request, Transaction $transaction) {
        $transaction->update($request->only(['subtotal_harga']));
        return back()->with('success', 'Transaksi diperbarui');
    }
}