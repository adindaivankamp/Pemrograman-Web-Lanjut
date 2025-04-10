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
                'supplier_kode'   => 'SUP001',
                'supplier_nama'   => 'Andi Wijaya',
                'supplier_alamat' => 'Jl. Teknologi No. 10, Jakarta',
                'supplier_telp'   => '081234567890',
            ],
            [
                'supplier_kode'   => 'SUP002',
                'supplier_nama'   => 'Siti Lestari',
                'supplier_alamat' => 'Jl. Mode No. 5, Bandung',
                'supplier_telp'   => '082345678901',
            ],
            [
                'supplier_kode'   => 'SUP003',
                'supplier_nama'   => 'Budi Santoso',
                'supplier_alamat' => 'Jl. Kuliner No. 3, Surabaya',
                'supplier_telp'   => '083456789012',
            ],
            [
                'supplier_kode'   => 'SUP004',
                'supplier_nama'   => 'Dewi Kartika',
                'supplier_alamat' => 'Jl. Segar No. 8, Yogyakarta',
                'supplier_telp'   => '084567890123',
            ],
            [
                'supplier_kode'   => 'SUP005',
                'supplier_nama'   => 'Rudi Hartono',
                'supplier_alamat' => 'Jl. Tulis No. 12, Malang',
                'supplier_telp'   => '085678901234',
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}
