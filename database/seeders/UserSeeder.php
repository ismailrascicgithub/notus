<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kreiramo admin korisnika
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123')
        ]);

        // Dodeljujemo rolu
        $admin->assignRole('admin');
    }
}
