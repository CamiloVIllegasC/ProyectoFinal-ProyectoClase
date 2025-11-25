<?php

namespace Database\Seeders;

use App\Models\Login;
use Illuminate\Database\Seeder;

class LoginSeeder extends Seeder
{
    /**
     * Create a default login account for local testing.
     */
    public function run(): void
    {
        Login::updateOrCreate(
            ['email' => 'admin@inventario.com'],
            ['password' => 'password123']
        );
    }
}
