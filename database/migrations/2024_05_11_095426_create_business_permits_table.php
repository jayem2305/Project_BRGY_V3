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
        Schema::create('business_permits', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('reg_num');
            $table->foreign('reg_num')->references('reg_number')->on('residents')->onDelete('cascade');
            $table->string('type')->default('Business Permit');
            $table->enum('voters', ['Voters', 'Non-Voters']);
            $table->string('name');
            $table->string('copy');
            $table->string('bname');
            $table->string('baddress');
            $table->string('requirements'); // Assuming file path will be stored
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('cnum')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_permits');
    }
};
