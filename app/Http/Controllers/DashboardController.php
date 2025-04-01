<?php

namespace App\Http\Controllers;

use App\Models\EnergyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the latest energy info record or create an empty one if none exists
        $energyInfo = EnergyInfo::latest()->first() ?? new EnergyInfo();

        $electricityUsage = $energyInfo->electricityUsage ?? 0;
        $oilUsage = $energyInfo->oilUsage ?? 0;
        $electricityConversion = $energyInfo->electricityConversion ?? 1.2;
        $oilConversion = $energyInfo->oilConversion ?? 1.4;
        $dayCreated = $energyInfo->dayCreated ?? 01;
        $monthCreated = $energyInfo->monthCreated ?? 01;

        $convertedElectricityUsage = $this->convertElectricityUsage($electricityUsage, $electricityConversion);
        $convertedOilUsage = $this->convertOilUsage($oilUsage, $oilConversion);

        return view('dashboard', compact(
            'electricityUsage', 
            'oilUsage', 
            'electricityConversion', 
            'oilConversion',
            'convertedElectricityUsage', 
            'convertedOilUsage',
            'dayCreated',
            'monthCreated'
        ));
    }

    private function convertElectricityUsage($electricityUsage, $electricityConversion)
    {
        return $electricityUsage * $electricityConversion;
    }

    private function convertOilUsage($oilUsage, $oilConversion)
    {
        return $oilUsage * $oilConversion;
    }
}