<?php

namespace Database\Seeders;

use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::create([
        //     'name' => 'Kasir Raciwon',
        //     'email' => 'Kasir@raciwon.com',
        //     'password' => Hash::make('password123'),
        //     'role' => 'cashier',
        // ]);
        Table::create([
            'id' => 1,
            'number' => '01',
            'capacity' => 4,
            'qr_code' => 'QR-T01',
            'status' => 'available',
        ]);
    }
}
