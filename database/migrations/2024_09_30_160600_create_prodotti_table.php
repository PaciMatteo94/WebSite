<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Prodotti', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('categoria');
            $table->string('nome_prodotto');
            $table->string('info_prodotto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Prodotti');
    }
};
