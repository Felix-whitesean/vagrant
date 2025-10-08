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
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->decimal('weight' ,10, 2);
            $table->decimal('volume' ,10, 2);
            $table->foreignId('client_id')->nullable()->constrained('clients', 'id')->nullOnDelete();
            $table->enum('cargo_type' ,['perishable', 'dangerous', 'general', 'other'])->default('general');
            $table->boolean('is_active')->default(TRUE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cargos');
    }
};
