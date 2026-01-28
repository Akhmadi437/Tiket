<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_type_id', // ✅ ganti dari tipe
        'harga',
        'stok',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // ✅ relasi ke TicketType
    public function ticketType()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }

    public function detailOrders()
    {
        return $this->hasMany(DetailOrder::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'detail_orders')
            ->withPivot('jumlah', 'subtotal_harga');
    }
}
