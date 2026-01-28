<x-layouts.admin title="Tambah Lokasi">
    <div class="container mx-auto p-10">
        <div class="max-w-md mx-auto">
            <h1 class="text-2xl font-bold mb-4">Tambah Lokasi</h1>

            @if($errors->any())
                <div class="alert alert-error mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l-2-2m0 0l-2-2m2 2l2-2m-2 2l-2 2m8-8a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <form action="{{ route('admin.lokations.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Nama Lokasi</span>
                            </label>
                            <input type="text" name="nama_lokasi" placeholder="Masukkan nama lokasi" 
                                class="input input-bordered @error('nama_lokasi') input-error @enderror" 
                                value="{{ old('nama_lokasi') }}" required>
                            @error('nama_lokasi')
                                <span class="text-error text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary flex-1">Simpan</button>
                            <a href="{{ route('admin.lokations.index') }}" class="btn btn-ghost flex-1">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin>
