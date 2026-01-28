<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class HistoriesController extends Controller
{
    public function index()
    {
        $histories = Order::with('event', 'user')->latest()->get();
        return view('admin.history.index', compact('histories'));
    }

    public function show(string $id)
    {
        $order = Order::with(['event.lokasi', 'detailOrders.tiket.ticketType', 'user'])->findOrFail($id);
        return view('admin.history.show', compact('order'));
    }
}
