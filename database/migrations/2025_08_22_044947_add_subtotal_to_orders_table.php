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
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'subtotal')) {
            $table->decimal('subtotal', 10, 2)->after('payment_method')->nullable();
        }

        if (!Schema::hasColumn('orders', 'shipping')) {
            $table->decimal('shipping', 10, 2)->after('subtotal')->nullable();
        }

        if (!Schema::hasColumn('orders', 'total')) {
            $table->decimal('total', 10, 2)->after('shipping')->nullable();
        }
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
           $table->dropColumn(['subtotal', 'shipping', 'total']);
        });
    }
};
