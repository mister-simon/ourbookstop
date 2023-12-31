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
        Schema::create('shelf_invites', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->timestamps();

            $table->foreignUlid('shelf_id')
                ->constrained('shelves')
                ->cascadeOnDelete();

            $table->foreignUlid('user_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignUlid('invited_by_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table
                ->string('name')
                ->nullable();

            $table
                ->string('email')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelf_invites');
    }
};
