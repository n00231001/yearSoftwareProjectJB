<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyInfo extends Model
{
    use HasFactory;

    protected $table = 'energy_info'; // Ensure the correct table name is set

    protected $fillable = [
        'electrictyUsage',
        'oilUsage',
        'gasUsage'
    ];

    /**
     * Retrieve all energy info records from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getEnergyInfo()
    {
        return $this->hasMany(electricityUsage::class);
    }
}
