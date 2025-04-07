<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create(['role_name' => "admin"]);
        Role::factory()->create(['role_name' => "user"]);
        Role::factory()->create(['role_name' => "company_leader"]);
    }
}
