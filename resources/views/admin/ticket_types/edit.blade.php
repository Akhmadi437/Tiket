<x-layouts.admin title="Edit Tipe Tiket">
    <div class="container mx-auto p-6 max-w-xl">
        <h1 class="text-xl font-bold mb-4">Edit Tipe Tiket</h1>

        <form action="{{ route('admin.ticket-types.update', $type->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-control">
                <label class="label">Nama Tipe Tiket</label>
                <input type="text" name="nama" class="input input-bordered"
                       value="{{ old('nama', $type->nama) }}" required>

                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button class="btn btn-primary">Update</button>
                <a href="{{ route('admin.ticket-types.index') }}" class="btn btn-ghost">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
