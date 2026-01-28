<x-layouts.admin title="Tambah Tipe Tiket">
    <div class="container mx-auto p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Tambah Tipe Tiket</h1>

        <form action="{{ route('admin.ticket-types.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-control">
                <label class="label">Nama Tipe Tiket</label>
                <input type="text" name="nama" class="input input-bordered" required>
                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.ticket-types.index') }}" class="btn btn-ghost">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
