<?php

namespace Database\Seeders;

use App\Models\TicketType;
use Illuminate\Database\Seeder;

class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticketTypes = [
            [
                'nama' => 'Premium',
                'description' => 'Premium ticket with VIP benefits',
            ],
            [
                'nama' => 'Reguler',
                'description' => 'Standard ticket',
            ],
        ];

        foreach ($ticketTypes as $type) {
            TicketType::create($type);
        }
    }
}
