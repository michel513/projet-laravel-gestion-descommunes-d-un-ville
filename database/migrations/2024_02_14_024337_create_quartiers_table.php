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
        Schema::create('quartiers', function (Blueprint $table) {
            $table->id('IdQuartier');
            $table->string('nomQuartier');
            $table->unsignedBigInteger('IdCommune');
            $table->foreign('IdCommune')->references('IdCommune')->on('communes');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quartiers');
    }
};
