<?php

namespace App\Http\Controllers;

use App\Models\EnergyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {

        $energyData = EnergyInfo::latest()->first();

        if ($energyData && $energyData->electrictyUsage) {
            $electricityUsage = $energyData->electrictyUsage;
        }        

        return view('dashboard', compact('electricityUsage'));
    }
}
 