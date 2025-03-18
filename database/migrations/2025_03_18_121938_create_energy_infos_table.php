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
        Schema::create('energy_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("property_id");
            $table->integer("ElecUsage");
            $table->integer("oilUsage");
            $table->integer("gasUsage");
            $table->integer("ElecConversion");
            $table->integer("oilConversion");
            $table->integer("gasConversion");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energy_infos');
    }
};
