<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnergyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('energy_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('electrictyUsage');
            $table->integer('oilUsage');
            $table->integer('gasUsage');
            $table->integer('electricityConversion');
            $table->integer('OilConversion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('energy_infos');
    }
}