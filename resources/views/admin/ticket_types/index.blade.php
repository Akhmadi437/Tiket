<x-layouts.admin title="Manajemen Tipe Tiket">
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold">Manajemen Tipe Tiket</h1>
            <a href="{{ route('admin.ticket-types.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success mb-4">{{ session('success') }}</div>
        @endif

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Tipe</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($types as $type)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $type->nama }}</td>
                                <td class="flex gap-2 justify-end">
                                    <a href="{{ route('admin.ticket-types.edit', $type->id) }}"
                                       class="btn btn-sm btn-primary mr-2">Edit</a>

                                    <form action="{{ route('admin.ticket-types.destroy', $type->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus tipe tiket ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm bg-red-500 text-white">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3">Belum ada tipe tiket.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts.admin>
