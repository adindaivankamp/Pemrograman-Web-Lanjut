<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Elektronik (kategori_id = 1)
            ['kategori_id' => 1, 'barang_kode' => 'EL01', 'barang_nama' => 'Televisi', 'harga_beli' => 2000000, 'harga_jual' => 2500000],
            ['kategori_id' => 1, 'barang_kode' => 'EL02', 'barang_nama' => 'Handphone', 'harga_beli' => 3000000, 'harga_jual' => 3500000],
            
            // Pakaian (kategori_id = 2)
            ['kategori_id' => 2, 'barang_kode' => 'PK01', 'barang_nama' => 'Kemeja', 'harga_beli' => 80000, 'harga_jual' => 100000],
            ['kategori_id' => 2, 'barang_kode' => 'PK02', 'barang_nama' => 'Jaket Jeans', 'harga_beli' => 200000, 'harga_jual' => 250000],
            
            // Makanan (kategori_id = 3)
            ['kategori_id' => 3, 'barang_kode' => 'MK01', 'barang_nama' => 'Roti Tawar', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['kategori_id' => 3, 'barang_kode' => 'MK02', 'barang_nama' => 'Mie Instan', 'harga_beli' => 2500, 'harga_jual' => 3500],
            
            // Minuman (kategori_id = 4)
            ['kategori_id' => 4, 'barang_kode' => 'MI01', 'barang_nama' => 'Susu UHT', 'harga_beli' => 5000, 'harga_jual' => 7500],
            ['kategori_id' => 4, 'barang_kode' => 'MI02', 'barang_nama' => 'Jus Jeruk', 'harga_beli' => 5000, 'harga_jual' => 8000],
            
            // ATK (kategori_id = 5)
            ['kategori_id' => 5, 'barang_kode' => 'ATK01', 'barang_nama' => 'Pulpen', 'harga_beli' => 3000, 'harga_jual' => 4000],
            ['kategori_id' => 5, 'barang_kode' => 'ATK02', 'barang_nama' => 'Pensil', 'harga_beli' => 2000, 'harga_jual' => 3000],
        ];

        DB::table('m_barang')->insert($data);
    }
}
