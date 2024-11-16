<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('reg_number')->unique(); // This will be our custom primary key
            $table->string('lname');
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('ext')->nullable();
            $table->string('address');
            $table->string('household');
            $table->string('Birth');
            $table->string('birthday');
            $table->string('age');
            $table->string('cnum');
            $table->string('gender');
            $table->string('civil');
            $table->string('citizenship');
            $table->string('occupation');
            $table->string('indicate_if')->nullable();
            $table->string('owner_type');
            $table->string('owner_name');
            $table->integer('number_of_family');
            $table->string('prescintnum')->nullable();
            $table->string('daysofliving');
            $table->string('proof_of_owner')->nullable();
            $table->string('voters_filename')->nullable();
            $table->string('valid_id_filename');
            $table->string('image_filename');
            $table->string('IDtype');
            $table->string('email');
            $table->string('password');
            $table->string('status')->default('Resident');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('residents');
    }
}
