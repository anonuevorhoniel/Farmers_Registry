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
        Schema::create('assistance_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farmer_id');
            $table->unsignedBigInteger('assistance_id');
            $table->date('given_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('farmer_id')->references('id')->on('farmers')->cascadeOnDelete();
            $table->foreign('assistance_id')->references('id')->on('assistances')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistance_histories');
    }
};
