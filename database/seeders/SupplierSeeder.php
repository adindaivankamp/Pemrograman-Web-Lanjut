<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            ['supplier_kode' => 'SUP001', 'supplier_nama' => 'Supplier Elektronik'],
            ['supplier_kode' => 'SUP002', 'supplier_nama' => 'Supplier Fashion'],
            ['supplier_kode' => 'SUP003', 'supplier_nama' => 'Supplier Makanan'],
            ['supplier_kode' => 'SUP004', 'supplier_nama' => 'Supplier Minuman'],
            ['supplier_kode' => 'SUP005', 'supplier_nama' => 'Supplier ATK'],
        ];

        DB::table('m_supplier')->insert($data);
    }
}
