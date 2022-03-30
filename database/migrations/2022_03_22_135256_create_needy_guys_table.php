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
        Schema::create('needy_guys', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->bigInteger("cnic");
            $table->bigInteger("phone");
            $table->string("city");
            $table->string("address");
            $table->string("img")->default(null);
            $table->bigInteger("monthly_income");
            $table->bigInteger("family_members");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('needy_guys');
    }
};
