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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cargo_id')->nullable()->constrained('cargos', 'id')->nullOnDelete();
            $table->foreignId('ship_id')->nullable()->constrained('cargos', 'id')->nullOnDelete();
            $table->foreignId('origin_port_id')->nullable()->constrained('ports', 'id')->nullOnDelete();
            $table->foreignId('destination_port_id')->nullable()->constrained('ports', 'id')->nullOnDelete();
            $table->dateTime('departure_date');
            $table->date('arrival_estimate');
            $table->date('actual_arrival_date');
            $table->enum('status', ['pending', 'in_transit', 'delivered', 'delayed'])->DEFAULT('pending');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
