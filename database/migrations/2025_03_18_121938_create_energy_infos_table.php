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
            $table->integer('electricityUsage');
            $table->integer('oilUsage');
            $table->decimal('electricityConversion')->nullable();
            $table->decimal('OilConversion')->nullable();
            $table->integer('dayCreated')->nullable();
            $table->integer('monthCreated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('energy_infos', function (Blueprint $table) {
            $table->dropColumn(['dayCreated', 'monthCreated']);
        });
}};