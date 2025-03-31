<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyInfo extends Model
{
    use HasFactory;

    protected $table = 'energy_infos'; // Ensure the correct table name is set

    protected $fillable = [
        'electricityUsage',
        'oilUsage',
        'electricityConversion',
        'oilConversion',
        'dayCreated',
        'monthCreated'
 
    ];

    /**
     * Retrieve all energy info records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getEnergyInfo()
    {
        return $this->hasMany(electricityUsage::class);
        return $this->hasMany(oilUsage::class);
    }
}
