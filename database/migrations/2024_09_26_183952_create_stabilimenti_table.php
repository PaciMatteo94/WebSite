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
        Schema::create('stabilimenti', function (Blueprint $table) {
            $table->id();
            $table->string('regione');
            $table->string('nome_stabilamento');
            $table->string('via');
            $table->text('mappa_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stabilimenti');
    }
};
