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
        Schema::create('certificate_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('reg_num');
            $table->foreign('reg_num')->references('reg_number')->on('residents')->onDelete('cascade');
            $table->string('type')->default('Barangay Certificate');
            $table->string('voters');
            $table->string('name');
            $table->string('copy');
            $table->string('requirements');
            $table->string('purpose');
            $table->string('otherpurpose')->nullable();
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
        Schema::dropIfExists('certificate_request');
    }
};
