<x-layouts.admin title="Manajemen Lokasi">
    <div class="container mx-auto p-10">
        <div class="flex">
            <h1 class="text-3xl font-semibold mb-4">Manajemen Lokasi</h1>
            <a href="{{ route('admin.lokations.create') }}" class="btn btn-primary ml-auto">Tambah Lokasi</a>
        </div>
        @if(session('success'))
            <div class="toast toast-bottom toast-center">
                <div class="alert alert-success">
                    <span>{{ session('success') }}</span>
                </div>
            </div>

            <script>
            setTimeout(() => {
                document.querySelector('.toast')?.remove()
            }, 3000)
            </script>
        @endif
        <div class="overflow-x-auto rounded-box bg-white p-5 shadow-xs">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lokasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($lokasis as $lokasi)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $lokasi->nama_lokasi }}</td>
                            <td class="flex gap-2">
                                <a href="{{ route('admin.lokations.edit', $lokasi->id) }}" class="btn btn-sm">Edit</a>
                                <form action="{{ route('admin.lokations.destroy', $lokasi->id) }}" method="POST" onsubmit="return confirm('Yakin hapus lokasi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-error">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="3">Belum ada lokasi tersedia.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.admin>
