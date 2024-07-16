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
        Schema::create('farm_crops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('farm_id');
            $table->unsignedBigInteger('crop_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('farm_id')->references('id')->on('farms')->cascadeOnDelete();
            $table->foreign('crop_id')->references('id')->on('crop_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farm_crops');
    }
};