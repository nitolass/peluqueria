<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Admin\Users\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Juan admin
        User::firstOrCreate(
            ['email' => 'juan@admin.es'],
            [
                'name' => 'Juan',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]
        );

        // Pepe cliente
        User::firstOrCreate(
            ['email' => 'pepe@mail.es'],
            [
                'name' => 'Pepe',
                'password' => bcrypt('12345678'),
                'role' => 'client',
            ]
        );

        // Juan Prueba cliente
        User::firstOrCreate(
            ['email' => 'juanprueba@mail.es'],
            [
                'name' => 'Juan Prueba',
                'password' => bcrypt('12345678'),
                'role' => 'client',
            ]
        );
    }
}
