<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expense_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->unsignedBigInteger('created_by_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('created_by_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expense_categories');
    }
};
