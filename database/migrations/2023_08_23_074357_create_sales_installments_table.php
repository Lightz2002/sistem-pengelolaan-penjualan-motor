<?php

use App\Models\Sales;
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
        Schema::create('sales_installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 50)->nullable();
            $table->integer('period_no')->nullable()->default(1);
            $table->integer('period_left')->nullable();
            $table->integer('late_payment_days')->nullable()->default(0);
            $table->string('receipt_date', 50)->nullable();
            $table->string('due_date', 50)->nullable();
            $table->decimal('installment_amount', 10, 2)->nullable();
            $table->decimal('total_payment', 10, 2)->nullable();
            $table->decimal('fine', 10, 2)->nullable();
            $table->decimal('paid_fine', 10, 2)->nullable();
            $table->decimal('penalty_debt', 10, 2)->nullable();
            $table->decimal('discount_amount', 10, 2)->nullable();
            $table->string('pay_in', 50)->nullable();
            $table->string('account', 50)->nullable();
            $table->longText('note')->nullable();
            $table->foreignIdFor(Sales::class, 'sales_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_installment');
    }
};
