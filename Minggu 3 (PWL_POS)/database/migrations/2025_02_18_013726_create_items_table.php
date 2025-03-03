<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*** Run the migrations.*/
    // menambahkan kolom 
    public function up()
    {
    Schema::create('items', function (Blueprint $table) { //membuat tabel baru bernama "items". Fungsi anonim (closure) di dalam kurung kurawal akan menentukan kolom-kolom apa saja yang akan ada di dalam tabel "items".
        $table->id(); //membuat kolom "id" sebagai primary key dan auto-increment.
        $table->string('name'); //membuat kolom "name" dengan tipe data string.
        $table->text('description'); //membuat kolom "description" dengan tipe data text
        $table->timestamps(); //membuat dua kolom, "created_at" dan "updated_at".
    });
    }

    /*** Reverse the migrations.*/
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
