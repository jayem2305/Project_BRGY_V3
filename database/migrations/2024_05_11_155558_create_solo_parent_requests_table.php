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
        Schema::create('solo_parent_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('reg_num');
            $table->foreign('reg_num')->references('reg_number')->on('residents')->onDelete('cascade');
            $table->string('type')->default('Solo Parents');
            $table->string('voters');
            $table->string('name');
            $table->integer('copy');
            $table->string('requirements');
            $table->json('children');
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('cnum')->nullable();
            $table->string('status')->default('Pending');
            // Add other columns as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solo_parent_requests');
    }
};
