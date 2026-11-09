<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('membership_levels', function (Blueprint $table) {
            $table->id();
            $table->string('level_name');
            $table->decimal('fee', 10, 2)->default(0);
            $table->integer('validity_period')->default(1);
            $table->text('benefits')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('membership_levels');
    }
};