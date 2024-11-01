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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('payment_method');
            $table->date('entry_date');
            $table->decimal('amount', 10, 2);
            $table->string('description')->nullable();
            $table->string('mobile_number')->nullable(); // New field
            $table->string('pan_number')->nullable();    // New field
            $table->string('area')->nullable();          // New field
            $table->foreignId('expense_category_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('expenses');
    }
};
