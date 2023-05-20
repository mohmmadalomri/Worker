<?php

namespace Database\Seeders;

use App\Models\Salarie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalarieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Salarie::factory()->count(50)->create();
    }
}
