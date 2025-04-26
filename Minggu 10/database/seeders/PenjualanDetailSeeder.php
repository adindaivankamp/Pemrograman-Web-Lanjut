<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
        // Transaksi 1
        ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 2500000, 'jumlah' => 1], // Televisi
        ['penjualan_id' => 1, 'barang_id' => 3, 'harga' => 100000, 'jumlah' => 1], // Kemeja
        ['penjualan_id' => 1, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 1], // Roti Tawar

        // Transaksi 2
        ['penjualan_id' => 2, 'barang_id' => 2, 'harga' => 3500000, 'jumlah' => 1], // Handphone
        ['penjualan_id' => 2, 'barang_id' => 4, 'harga' => 250000, 'jumlah' => 1], // Jaket Jeans
        ['penjualan_id' => 2, 'barang_id' => 6, 'harga' => 3500, 'jumlah' => 1], // Mie Instan

        // Transaksi 3
        ['penjualan_id' => 3, 'barang_id' => 7, 'harga' => 7500, 'jumlah' => 1], // Susu UHT
        ['penjualan_id' => 3, 'barang_id' => 9, 'harga' => 4000, 'jumlah' => 1], // Pulpen
        ['penjualan_id' => 3, 'barang_id' => 10, 'harga' => 3000, 'jumlah' => 1], // Pensil

        // Transaksi 4
        ['penjualan_id' => 4, 'barang_id' => 1, 'harga' => 2500000, 'jumlah' => 1], // Televisi
        ['penjualan_id' => 4, 'barang_id' => 8, 'harga' => 8000, 'jumlah' => 1], // Jus Jeruk
        ['penjualan_id' => 4, 'barang_id' => 10, 'harga' => 3000, 'jumlah' => 1], // Pensil

        // Transaksi 5
        ['penjualan_id' => 5, 'barang_id' => 2, 'harga' => 3500000, 'jumlah' => 1], // Handphone
        ['penjualan_id' => 5, 'barang_id' => 6, 'harga' => 3500, 'jumlah' => 1], // Mie Instan
        ['penjualan_id' => 5, 'barang_id' => 9, 'harga' => 4000, 'jumlah' => 1], // Pulpen

        // Transaksi 6
        ['penjualan_id' => 6, 'barang_id' => 3, 'harga' => 100000, 'jumlah' => 1], // Kemeja
        ['penjualan_id' => 6, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 1], // Roti Tawar
        ['penjualan_id' => 6, 'barang_id' => 8, 'harga' => 8000, 'jumlah' => 1], // Jus Jeruk

        // Transaksi 7
        ['penjualan_id' => 7, 'barang_id' => 4, 'harga' => 250000, 'jumlah' => 1], // Jaket Jeans
        ['penjualan_id' => 7, 'barang_id' => 7, 'harga' => 7500, 'jumlah' => 1], // Susu UHT
        ['penjualan_id' => 7, 'barang_id' => 9, 'harga' => 4000, 'jumlah' => 1], // Pulpen

        // Transaksi 8
        ['penjualan_id' => 8, 'barang_id' => 1, 'harga' => 2500000, 'jumlah' => 1], // Televisi
        ['penjualan_id' => 8, 'barang_id' => 2, 'harga' => 3500000, 'jumlah' => 1], // Handphone
        ['penjualan_id' => 8, 'barang_id' => 10, 'harga' => 3000, 'jumlah' => 1], // Pensil

        // Transaksi 9
        ['penjualan_id' => 9, 'barang_id' => 3, 'harga' => 100000, 'jumlah' => 1], // Kemeja
        ['penjualan_id' => 9, 'barang_id' => 5, 'harga' => 20000, 'jumlah' => 1], // Roti Tawar
        ['penjualan_id' => 9, 'barang_id' => 8, 'harga' => 8000, 'jumlah' => 1], // Jus Jeruk

        // Transaksi 10
        ['penjualan_id' => 10, 'barang_id' => 4, 'harga' => 250000, 'jumlah' => 1], // Jaket Jeans
        ['penjualan_id' => 10, 'barang_id' => 6, 'harga' => 3500, 'jumlah' => 1], // Mie Instan
        ['penjualan_id' => 10, 'barang_id' => 7, 'harga' => 7500, 'jumlah' => 1], // Susu UHT
    ];
    DB::table('t_penjualan_detail')->insert($data);
    }
}
