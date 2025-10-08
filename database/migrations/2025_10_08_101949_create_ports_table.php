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
        Schema::create('ports', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('country', 100);
            $table->string('port_type',100)->nullable();
            $table->string('coordinates', 50);
            $table->float('depth')->nullable();
            $table->integer('docking_capacity')->nullable();
            $table->float('max_vessel_size');
            $table->string('security_level',50);
            $table->boolean('customs_authorized');
            $table->string('operational_hours', 50)->nullable();
            $table->string('port_manager', 255);
            $table->string('port_contact_info',255);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ports');
    }
};
