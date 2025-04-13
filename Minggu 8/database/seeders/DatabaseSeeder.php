<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class,
            LevelSeeder::class,
            UserSeeder::class,
            PenjualanSeeder::class,
            StokSeeder::class,
            PenjualanDetailSeeder::class,
            SupplierSeeder::class
        ]);
    }
}
