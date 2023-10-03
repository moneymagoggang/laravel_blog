<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Admin::query()->create([
            'name' => 'CorpSoft',
            'email' => 'admin@corpsoft.io',
            'password' => Hash::make('secret123'),
        ]);
    }
}
