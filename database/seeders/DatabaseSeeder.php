<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(ProductSeeder::class);

        $this->call(ProviderSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(ServiceSeeder::class);
    }
}
