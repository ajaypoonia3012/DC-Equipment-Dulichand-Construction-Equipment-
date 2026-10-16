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
        Schema::create('enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('location')->nullable(); // e.g. Jaipur, Ajmer, Udaipur, Jodhpur
            $table->string('inquiry_type')->default('general'); // equipment, chemicals, repair_service, rental, general
            $table->string('product_or_service_interest')->nullable();
            $table->text('message');
            $table->enum('status', ['new', 'contacted', 'quotation_sent', 'closed', 'rejected'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enquiries');
    }
};
