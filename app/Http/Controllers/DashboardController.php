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
        $electricityConversion = $energyInfo->electricityConversion ?? 0;
        $oilConversion = $energyInfo->oilConversion ?? 0;

        $convertedElectricityUsage = $this->convertElectricityUsage($oilUsage, $electricityConversion);
        $convertedOilUsage = $this->convertOilUsage($oilUsage, $oilConversion);

        return view('dashboard', compact(
            'electricityUsage', 
            'oilUsage', 
            'electricityConversion', 
            'oilConversion',
            'convertedElectricityUsage', 
            'convertedOilUsage'
        ));
    }

    private function convertElectricityUsage($oilUsage, $conversionFactor)
    {
        return $oilUsage * $conversionFactor;
    }

    private function convertOilUsage($oilUsage, $conversionFactor)
    {
        return $oilUsage * $conversionFactor;
    }
}