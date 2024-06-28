<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('memberCategory_id');
            $table->string('name');
            $table->string('position');
            $table->string('section');
            $table->string('period');
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->foreign('memberCategory_id')->references('id')->on('member_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};