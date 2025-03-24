<?php

namespace App\Http\Controllers;

use App\Models\energyInfo;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Assuming you want to get the latest electricity usage
        $latestEnergyInfo = energyInfo::latest()->first();
        $electricityUsage = $latestEnergyInfo ? $latestEnergyInfo->electricityUsage : 0;

        return view('dashboard', compact('electricityUsage'));
    }
}