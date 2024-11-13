<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Bruno Cesar',
            'email' => 'test@example.com',
            'cim'   => '123456',
            'password' => Hash::make('1234'),
            'administrador' => true
        ]);
    }
}
