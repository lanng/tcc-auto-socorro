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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('work_order');
            $table->dateTime('date');
            $table->string('origin');
            $table->string('destination');
            $table->string('vehicle');
            $table->string('vehicle_plate');
            $table->unsignedBigInteger('plate_id')->nullable();
            $table->unsignedBigInteger('insurer_id')->nullable();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->foreign('plate_id')->references('id')->on('plates');
            $table->foreign('insurer_id')->references('id')->on('insurers');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->double('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign('plate_id');
            $table->dropForeign('insurer_id');
            $table->dropForeign('company_id');
            $table->dropForeign('driver_id');
        });
        Schema::dropIfExists('services');
    }
};
