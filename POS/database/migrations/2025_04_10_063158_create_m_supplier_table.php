<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('m_supplier', function (Blueprint $table) {
            $table->bigIncrements('supplier_id'); // otomatis jadi kolom 'id' sebagai primary key
            $table->string('supplier_kode')->unique();
            $table->string('supplier_nama');
            $table->text('supplier_alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_supplier');
    }
};
