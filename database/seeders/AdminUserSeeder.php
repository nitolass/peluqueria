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


    }
}
