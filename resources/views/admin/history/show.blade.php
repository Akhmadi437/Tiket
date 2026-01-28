<x-layouts.admin title="Detail Pemesanan">
    <div class="container mx-auto p-10">
        <div class="flex justify-center">
            <div class="w-full max-w-3xl">

                <!-- Header -->
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-xl font-bold">Detail Pemesanan</h2>
                    <p class="text-sm text-gray-500">
                        Order #{{ $order->id }} • {{ optional($order->order_date ?? $order->created_at)->format('d M Y H:i') }}
                    </p>
                </div>

                <!-- Card -->
                <div class="card bg-base-100 shadow-md">
                    <div class="card-body">

                        <!-- Info Event (kiri) -->
                        <div class="flex items-start gap-4">
                            <div class="w-24 h-24 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                @if (!empty($order->event?->gambar))
                                    <img src="{{ asset('images/events/' . $order->event->gambar) }}"
                                         class="w-full h-full object-cover" alt="Event">
                                @else
                                    <span class="text-gray-400 text-sm">No Image</span>
                                @endif
                            </div>

                            <div class="flex-1">
                                <h3 class="font-bold text-lg leading-tight">
                                    {{ $order->event?->judul ?? '-' }}
                                </h3>
                                <p class="text-sm text-gray-500">
                                    @if($order->event?->lokasi)
                                        {{ $order->event->lokasi->nama_lokasi }}
                                    @else
                                        -
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="divider my-4"></div>

                        <!-- List Tiket -->
                        <div class="space-y-3">
                            @foreach ($order->detailOrders as $d)
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-semibold capitalize">{{ $d->tiket->ticketType?->nama ?? '-' }}</p>
                                        <p class="text-sm text-gray-500">
                                            Qty: {{ $d->jumlah ?? 0 }}
                                        </p>
                                    </div>

                                    <p class="font-semibold">
                                        Rp {{ number_format($d->subtotal_harga ?? 0, 0, ',', '.') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="divider my-4"></div>

                        <!-- Total -->
                        <div class="flex justify-between items-center">
                            <p class="font-semibold">Total</p>
                            <p class="font-bold text-lg">
                                Rp {{ number_format($order->total_harga ?? 0, 0, ',', '.') }}
                            </p>
                        </div>

                        <!-- Button -->
                        <div class="flex justify-end mt-5">
                            <a href="{{ route('admin.histories.index') }}" class="btn btn-primary">
                                Kembali ke Riwayat
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.admin>
