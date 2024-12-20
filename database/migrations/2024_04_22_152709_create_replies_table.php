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
    Schema::create('replies', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('comment_id');
        $table->text('replyname');
        $table->string('replyimage')->nullable(); 
        $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        $table->text('reply_text');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('replies');
    }
};
