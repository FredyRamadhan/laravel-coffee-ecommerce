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
        Schema::table('order_histories', function (Blueprint $table) {
            $table->integer('count')->default(1)->after('product_id');
            $table->string('order_number')->unique()->after('id');
            $table->string('status')->default('completed')->after('shipping');
            $table->integer('total')->after('shipping');
            $table->text('customer_address')->nullable()->after('total');
            $table->string('customer_phone')->nullable()->after('customer_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_histories', function (Blueprint $table) {
            $table->dropColumn(['count', 'order_number', 'status', 'total', 'customer_address', 'customer_phone']);
        });
    }
};
