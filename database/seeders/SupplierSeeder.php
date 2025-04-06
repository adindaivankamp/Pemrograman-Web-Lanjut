<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_nama'   => 'Supplier Elektronik',
                'supplier_alamat' => 'Jl. Teknologi No. 10, Jakarta',
                'supplier_telp'   => '081234567890',
            ],
            [
                'supplier_nama'   => 'Supplier Fashion',
                'supplier_alamat' => 'Jl. Mode No. 5, Bandung',
                'supplier_telp'   => '082345678901',
            ],
            [
                'supplier_nama'   => 'Supplier Makanan',
                'supplier_alamat' => 'Jl. Kuliner No. 3, Surabaya',
                'supplier_telp'   => '083456789012',
            ],
            [
                'supplier_nama'   => 'Supplier Minuman',
                'supplier_alamat' => 'Jl. Segar No. 8, Yogyakarta',
                'supplier_telp'   => '084567890123',
            ],
            [
                'supplier_nama'   => 'Supplier ATK',
                'supplier_alamat' => 'Jl. Tulis No. 12, Malang',
                'supplier_telp'   => '085678901234',
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}