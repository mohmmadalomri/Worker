<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(VacationSeeder::class);
        $this->call(DebtSeeder::class);
        $this->call(ExpenseSeeder::class);
        $this->call(SalarieSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OfferPriceSeeder::class);
        $this->call(TaskEmployeeSeeder::class);
        $this->call(HolidaySeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(InvoiceSeeder::class);



    }
}
