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
      $table->string('sales_code', 20)->nullable();
      $table->date('sales_date')->nullable();
      $table->boolean('sales_is_deleted')->default(false);
      $table->boolean('is_finish_edited')->default(false);
      $table->string('sales_status', 10)->nullable();
      $table->string('customer_name', 50)->nullable();
      $table->string('customer_nickname', 20)->nullable();
      $table->smallInteger('customer_age')->nullable();
      $table->smallInteger('customer_dependents')->nullable();
      $table->string('customer_gender', 1)->nullable();
      $table->string('customer_status', 12)->nullable();
      $table->bigInteger('customer_identity_card_no')->nullable();
      $table->bigInteger('customer_family_card_no')->nullable();
      $table->bigInteger('customer_phone_no')->nullable();
      $table->longText('customer_full_address')->nullable();
      $table->longText('customer_workplace_address')->nullable();
      $table->string('customer_workplace_name', 100)->nullable();
      $table->string('customer_workplace_position')->nullable();
      $table->decimal('customer_fix_income', 10, 2)->nullable();
      $table->decimal('customer_additional_income', 10, 2)->nullable();
      $table->decimal('customer_fix_expense', 10, 2)->nullable();
      $table->decimal('customer_additional_expense', 10, 2)->nullable();
      $table->longText('customer_address')->nullable();
      $table->string('customer_photo', 50)->nullable();
      $table->string('motor_type', 20)->nullable();
      $table->string('motor_plate_number', 10)->nullable();
      $table->string('motor_frame_number', 20)->nullable();
      $table->string('motor_engine_number', 20)->nullable();
      $table->string('motor_assemble_year', 20)->nullable();
      $table->string('motor_color', 15)->nullable();
      $table->string('sales_person', 30)->nullable();
      $table->string('sales_collector', 30)->nullable();
      $table->foreignIdFor(User::class, 'sales_surveyor')->nullable();
      $table->decimal('motor_dp', 10, 2)->nullable();
      $table->decimal('motor_price', 10, 2)->nullable();
      $table->string('motor_front_photo', 80)->nullable();
      $table->string('motor_back_photo', 80)->nullable();
      $table->string('motor_right_photo', 80)->nullable();
      $table->string('motor_left_photo', 80)->nullable();
      $table->decimal('motor_administration_fee', 10, 2)->default(150000);
      $table->decimal('motor_installment_amount', 10, 2)->default(0);
      $table->integer('motor_installment_period')->default(0);
      $table->string('sales_type', 20)->nullable();
      $table->foreignIdFor(Dealer::class, 'dealer_id')->nullable();
      $table->string('guarantor_name', 50)->nullable();
      $table->string('guarantor_relationship', 20)->nullable();
      $table->longText('guarantor_full_address')->nullable();
      $table->bigInteger('guarantor_phone_no')->nullable();
      $table->bigInteger('guarantor_identity_no')->nullable();
      $table->string('guarantor_occupation', 50)->nullable();
      $table->longText('guarantor_workplace_address')->nullable();
      $table->longText('note')->nullable();
      $table->string('house_photo', 80)->nullable();
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
