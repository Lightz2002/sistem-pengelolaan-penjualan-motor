<?php

use App\Models\Dealer;
use App\Models\User;
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
    Schema::create('sales', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('sales_code', 20)->nullable(true);
      $table->date('sales_date')->nullable(true);
      $table->boolean('sales_is_deleted')->default(false);
      $table->string('sales_status', 10)->nullable(true);
      $table->string('customer_name', 50)->nullable(true);
      $table->string('customer_nickname', 20)->nullable(true);
      $table->smallInteger('customer_age')->nullable(true);
      $table->smallInteger('customer_dependents')->nullable(true);
      $table->string('customer_gender', 1)->nullable(true);
      $table->string('customer_status', 12)->nullable(true);
      $table->bigInteger('customer_identity_card_no')->nullable(true);
      $table->bigInteger('customer_family_card_no')->nullable(true);
      $table->longText('customer_full_address')->nullable(true);
      $table->longText('customer_workplace_address')->nullable(true);
      $table->string('customer_workplace_name', 100)->nullable(true);
      $table->string('customer_workplace_position')->nullable(true);
      $table->decimal('customer_fix_income', 10, 2)->nullable(true);
      $table->decimal('customer_additional_income', 10, 2)->nullable(true);
      $table->decimal('customer_fix_expense', 10, 2)->nullable(true);
      $table->decimal('customer_additional_expense', 10, 2)->nullable(true);
      $table->longText('customer_address')->nullable(true);
      $table->string('customer_photo', 50)->nullable(true);
      $table->string('motor_type', 20)->nullable(true);
      $table->string('motor_plate_number', 10)->nullable(true);
      $table->string('motor_frame_number', 20)->nullable(true);
      $table->string('motor_engine_number', 20)->nullable(true);
      $table->string('motor_assemble_year', 20)->nullable(true);
      $table->string('motor_color', 15)->nullable(true);
      $table->string('sales_person', 30)->nullable(true);
      $table->string('sales_collector', 30)->nullable(true);
      $table->foreignIdFor(User::class, 'sales_surveyor')->nullable(true);
      $table->decimal('motor_dp', 10, 2)->nullable(true);
      $table->decimal('motor_price', 10, 2)->nullable(true);
      $table->string('motor_front_photo', 80)->nullable(true);
      $table->string('motor_back_photo', 80)->nullable(true);
      $table->string('motor_right_photo', 80)->nullable(true);
      $table->string('motor_left_photo', 80)->nullable(true);
      $table->decimal('motor_administration_fee', 10, 2)->default(150000);
      $table->decimal('motor_installment_amount', 10, 2)->default(0);
      $table->decimal('motor_commission_fee', 10, 2)->default(0);
      $table->string('sales_type', 20)->nullable(true);
      $table->foreignIdFor(Dealer::class, 'dealer_id')->nullable(true);
      $table->string('guarantor_name', 50)->nullable(true);
      $table->string('guarantor_relationship', 20)->nullable(true);
      $table->longText('guarantor_full_address')->nullable(true);
      $table->bigInteger('guarantor_phone_no')->nullable(true);
      $table->bigInteger('guarantor_identity_no')->nullable(true);
      $table->string('guarantor_occupation', 50)->nullable(true);
      $table->longText('guarantor_workplace_address')->nullable(true);
      $table->string('house_photo', 80)->nullable(true);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sales');
  }
};
