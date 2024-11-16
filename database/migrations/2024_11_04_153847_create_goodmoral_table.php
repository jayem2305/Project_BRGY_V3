<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodmoralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodmoral', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('reg_num');
            $table->foreign('reg_num')->references('reg_number')->on('residents')->onDelete('cascade');
            $table->string('type')->default('Certificate of Good moral For Employment');
            $table->string('voters');
            $table->string('name');
            $table->string('copy');
            $table->string('requirements');
            $table->string('purpose');
            $table->string('age')->nullable();
            $table->string('address')->nullable();
            $table->string('cnum')->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('goodmoral');
    }
}
