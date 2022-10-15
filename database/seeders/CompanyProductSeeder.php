<?php

namespace Database\Seeders;

use App\Models\CompanyProduct;
use Illuminate\Database\Seeder;

class CompanyProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        CompanyProduct::factory(7)->create();
    }
}
