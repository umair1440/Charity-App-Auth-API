<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->nullable(); // required
            $table->string('email')->unique()->nullable(); // required
            $table->string('img')->default("avatar.png"); 
            $table->string('role')->default("user");
            $table->bigInteger('cnic')->nullable();// required
            $table->bigInteger('phone')->nullable();; // required
            $table->string('status')->default("active");  
            $table->bigInteger('donations_num')->nullable();
            $table->string('password')->nullable(); // required
            $table->json('achievements')->nullable();
            $table->decimal('donated_money', 15, 2)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
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
};
