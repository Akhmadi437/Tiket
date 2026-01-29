<x-layouts.admin title="Tambah Tipe Tiket">
    <div class="card bg-base-100 shadow p-8 max-w-xl mx-auto mt-12">
        <h1 class="text-4xl font-semibold mb-6 text-center">Tambah Tipe Tiket</h1>

        <form action="{{ route('admin.ticket-types.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="form-control">
                <label class="block mb-2 text-sm font-medium text-center">
                    <span class="label-text">Nama Tiket</span>
                </label>

                <input 
                    type="text" 
                    name="nama" 
                    class="input input-bordered w-full" 
                    required
                >

                @error('nama')
                    <p class="text-red-500 text-sm mt-1 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button class="flex-1 py-2 text-white bg-blue-700 rounded hover:bg-blue-800">Simpan</button>
                <a href="{{ route('admin.ticket-types.index') }}" class="flex-1 py-2 text-center text-red-600 border border-red-600 rounded hover:bg-red-50">Batal</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
