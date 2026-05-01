<?php

namespace Database\Seeders;

use App\Models\projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class projecteSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        projects::factory()->count(10)->create();
    }
}
