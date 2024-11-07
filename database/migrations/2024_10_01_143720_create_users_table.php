<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable(); // Optional phone
            $table->text('address')->nullable(); // Optional address
            $table->string('password', 255);
            $table->string('popup_message')->nullable();
            $table->string('user_role')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();

            // Define foreign key for 'role_id' referencing 'roles' table
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}