<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Marie-Louise',
            'email' => 'mlpreira@gmail.com',
            'password' => Hash::make('ZM2021'),
            'email_verified_at' => now(),
        ]);

        $users = User::factory()->count(5)->create();
    }
}
