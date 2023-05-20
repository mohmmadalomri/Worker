<?php

namespace Database\Seeders;

use App\Models\OfferPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      OfferPrice::factory()->count(50)->create();
    }
}
