<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'event_id' => 'required|exists:events,id',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Tiket::create($validatedData);

        return redirect()
            ->route('admin.events.show', $validatedData['event_id'])
            ->with('success', 'Ticket berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $ticket = Tiket::findOrFail($id);

        $validatedData = $request->validate([
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $ticket->update($validatedData);

        return redirect()
            ->route('admin.events.show', $ticket->event_id)
            ->with('success', 'Ticket berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $ticket = Tiket::findOrFail($id);
        $eventId = $ticket->event_id;

        $ticket->delete();

        return redirect()
            ->route('admin.events.show', $eventId)
            ->with('success', 'Ticket berhasil dihapus.');
    }
}
