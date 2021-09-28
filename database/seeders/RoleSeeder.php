<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'name' => "visitor",
                'display_name' => "Visiteur",
            ],
            [
                'name' => "writer",
                'display_name' => "Rédactrice",
            ],
            [
                'name' => "admin",
                'display_name' => "Admin",
            ]]
        );
    }
}
