<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\PaymentConstants;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('payment_method');
            $table->date('entry_date');
            $table->decimal('amount', 10, 2);
            $table->string('description')->nullable();
            $table->string('mobile_number', 15)->nullable(); // Added mobile number
            $table->string('pan_number', 10)->nullable(); // Added PAN number
            $table->string('area', 100)->nullable(); // Added area
            $table->foreignId('income_category_id')->constrained()->onDelete('cascade');
            $table->foreignId('created_by_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
