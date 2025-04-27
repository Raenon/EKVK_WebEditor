<?php

namespace Database\Seeders;

use App\Models\Users;
use Carbon\Traits\Timestamp;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Users::factory()->create([
            'username' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin')
        ]);
        Users::factory(15)->create();


    }
}
