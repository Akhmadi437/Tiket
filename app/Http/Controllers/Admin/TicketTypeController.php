<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    public function index()
    {
        $types = TicketType::latest()->get();
        return view('admin.ticket_types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.ticket_types.create');
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'nama' => 'required|string|max:255|unique:ticket_types,nama',
        ]);

        TicketType::create($payload);

        return redirect()->route('admin.ticket-types.index')
            ->with('success', 'Tipe tiket berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $type = TicketType::findOrFail($id);
        return view('admin.ticket_types.edit', compact('type'));
    }

    public function update(Request $request, string $id)
    {
        $type = TicketType::findOrFail($id);

        $payload = $request->validate([
            'nama' => 'required|string|max:255|unique:ticket_types,nama,' . $type->id,
        ]);

        $type->update($payload);

        return redirect()->route('admin.ticket-types.index')
            ->with('success', 'Tipe tiket berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        TicketType::destroy($id);

        return redirect()->route('admin.ticket-types.index')
            ->with('success', 'Tipe tiket berhasil dihapus.');
    }
}
