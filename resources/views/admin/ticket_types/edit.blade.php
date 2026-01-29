<x-layouts.admin title="Edit Tipe Tiket">
    <div class="card bg-base-100 shadow p-8 max-w-xl mx-auto mt-12">
        <h1 class="text-4xl font-semibold mb-6 text-center">Edit Tipe Tiket</h1>

        <form action="{{ route('admin.ticket-types.update', $type->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-control">
                <label class="block mb-2 text-sm font-medium text-center">Nama Tiket</label>
                <input type="text" name="nama" class="input input-bordered w-full"
                       value="{{ old('nama', $type->nama) }}" required>

                @error('nama')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button class="btn btn-primary flex-1">Update</button>
                <a href="{{ route('admin.ticket-types.index') }}" class="flex-1 py-2 text-center text-red-600 border border-red-600 rounded hover:bg-red-50">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
