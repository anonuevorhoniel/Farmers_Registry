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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('name_extension')->nullable();
            $table->date('birth_date');
            $table->string('birth_place');
            $table->string('sex');
            $table->unsignedBigInteger('contact_number');
            $table->longText('other_information')->nullable();
            $table->unsignedBigInteger('farm_id');
            $table->unsignedBigInteger('farmer_type_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('farm_id')->references('id')->on('farms')->cascadeOnDelete();
            $table->foreign('farmer_type_id')->references('id')->on('farmer_types')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
