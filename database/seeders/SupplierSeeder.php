<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_supplier')->insert([
            [
                'kode_supplier' => 'SUP001',
                'nama_supplier' => 'PT. Maju Jaya',
                'alamat_supplier' => 'Jl. Merdeka No. 10, Jakarta',
            ],
            [
                'kode_supplier' => 'SUP002',
                'nama_supplier' => 'CV. Sejahtera Abadi',
                'alamat_supplier' => 'Jl. Pahlawan No. 25, Surabaya',
            ],
            [
                'kode_supplier' => 'SUP003',
                'nama_supplier' => 'Toko Lancar',
                'alamat_supplier' => 'Jl. Sudirman No. 5, Bandung',
            ],
        ]);
    }
}