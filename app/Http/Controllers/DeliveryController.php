<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function assignCourierForm(Order $order) {
        $couriers = \App\Models\User::where('role', 'kurir')->get();
        return view('deliveries.assign', compact('order', 'couriers'));
    }

    public function assignCourier(Request $request, Order $order) {
        $request->validate(['courier_id' => 'required|exists:users,id']);

        Delivery::create([
            'order_id' => $order->id,
            'courier_id' => $request->courier_id,
            'status' => 'on_the_way',
        ]);

        $order->update(['status' => 'on_the_way']);

        return redirect()->route('dashboard')->with('success', 'Kurir ditugaskan');
    }

    public function index() {
        $deliveries = Delivery::where('courier_id', Auth::id())->get();
        return view('deliveries.index', compact('deliveries'));
    }

    public function updateStatus(Request $request, Delivery $delivery) {
        $delivery->update(['status' => $request->status]);
        if ($request->status === 'delivered') {
            $delivery->order->update(['status' => 'delivered']);
        }
        return back()->with('success', 'Status diperbarui');
    }
}