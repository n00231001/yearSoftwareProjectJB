<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class energyInfo extends Model
{
    use hasfactory;

    protected $fillable = [
        'electrictyUsage',
        'oilUsage',
        'gasUsage'
    ];
}
