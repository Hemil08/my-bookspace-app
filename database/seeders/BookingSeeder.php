<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Booking::insert([
            ['status' => 'confirmed'],
            ['name' => 'pending'],
            ['name' => 'cancelled'],
        ]);
    }
}
