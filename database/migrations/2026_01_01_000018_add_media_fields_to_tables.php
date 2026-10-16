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
        if (Schema::hasTable('services') && !Schema::hasColumn('services', 'gallery')) {
            Schema::table('services', function (Blueprint $table) {
                $table->json('gallery')->nullable()->after('image');
            });
        }

        if (Schema::hasTable('categories') && !Schema::hasColumn('categories', 'gallery')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->json('gallery')->nullable()->after('image');
            });
        }

        if (Schema::hasTable('client_references')) {
            Schema::table('client_references', function (Blueprint $table) {
                if (!Schema::hasColumn('client_references', 'image')) {
                    $table->string('image')->nullable()->after('project_image');
                }
                if (!Schema::hasColumn('client_references', 'gallery')) {
                    $table->json('gallery')->nullable()->after('image');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('services') && Schema::hasColumn('services', 'gallery')) {
            Schema::table('services', function (Blueprint $table) {
                $table->dropColumn('gallery');
            });
        }

        if (Schema::hasTable('categories') && Schema::hasColumn('categories', 'gallery')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->dropColumn('gallery');
            });
        }

        if (Schema::hasTable('client_references')) {
            Schema::table('client_references', function (Blueprint $table) {
                if (Schema::hasColumn('client_references', 'gallery')) {
                    $table->dropColumn('gallery');
                }
                if (Schema::hasColumn('client_references', 'image')) {
                    $table->dropColumn('image');
                }
            });
        }
    }
};
