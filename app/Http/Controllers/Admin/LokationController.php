<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokationController extends Controller
{
    public function index()
    {
        $lokasis = Lokasi::latest()->get();
        return view('admin.lokations.index', compact('lokasis'));
    }

    public function create()
    {
        return view('admin.lokations.create');
    }

    public function store(Request $request)
    {
        $payload = $request->validate(
            [
                'nama_lokasi' => 'required|string|max:255|unique:lokasis,nama_lokasi',
            ],
            [
                'nama_lokasi.required' => 'Nama lokasi wajib diisi.',
                'nama_lokasi.unique' => 'Nama lokasi sudah terdaftar.',
            ]
        );

        Lokasi::create($payload);

        return redirect()->route('admin.lokations.index')
            ->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $lokasi = Lokasi::findOrFail($id);
        return view('admin.lokations.edit', compact('lokasi'));
    }

    public function update(Request $request, string $id)
    {
        $lokasi = Lokasi::findOrFail($id);

                $payload = $request->validate(
            [
                'nama_lokasi' => 'required|string|max:255|unique:lokasis,nama_lokasi,' . $lokasi->id,
            ],
            [
                'nama_lokasi.required' => 'Nama lokasi wajib diisi.',
                'nama_lokasi.unique' => 'Nama lokasi sudah terdaftar.',
            ]
        );


        $lokasi->update($payload);

        return redirect()->route('admin.lokations.index')
            ->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        Lokasi::destroy($id);

        return redirect()->route('admin.lokations.index')
            ->with('success', 'Lokasi berhasil dihapus.');
    }
}
