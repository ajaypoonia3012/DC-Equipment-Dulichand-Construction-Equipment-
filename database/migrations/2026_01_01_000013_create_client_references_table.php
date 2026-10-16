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
        Schema::create('client_references', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. "MEIL - Rajasthan Water Grid" or "JK Lakshmi Cement"
            $table->string('client_name'); // e.g. "MEIL", "JK Lakshmi Cement", "KEC International"
            $table->string('sector')->nullable(); // Infrastructure, Cement, Power, Metro, Roads & Highways
            $table->string('location')->nullable(); // e.g. "Jaipur, Rajasthan", "Pali, Rajasthan"
            $table->string('scope_supplied')->nullable(); // "Batching plant spares & DCP hyperplasticisers"
            $table->text('testimonial')->nullable();
            $table->string('testimonial_author')->nullable();
            $table->string('logo')->nullable();
            $table->string('project_image')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_references');
    }
};
