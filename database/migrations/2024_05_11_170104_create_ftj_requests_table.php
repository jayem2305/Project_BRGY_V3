<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFtjRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ftj_requests', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('reg_num');
            $table->foreign('reg_num')->references('reg_number')->on('residents')->onDelete('cascade');
            $table->string('type');
            $table->string('voters');
            $table->string('name');
            $table->string('copy');
            $table->string('number_day');
            $table->string('requirements');
            $table->string('parentrequirements')->nullable();
            $table->string('pname')->nullable();
            $table->string('paddress')->nullable();
            $table->string('page')->nullable();
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
        Schema::dropIfExists('ftj_requests');
    }
}
