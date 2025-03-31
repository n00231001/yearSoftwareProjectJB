<?php

namespace App\Http\Controllers;

use App\Models\EnergyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnergyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $energyInfos = EnergyInfo::all();
        return view('energy_infos.index', compact('energyInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
            //return redirect()->route('energyInfo.create')->with('error', 'access denied');
            return view('energyInfo.create');
        }
        
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'electricityUsage' => 'required|integer',
            'oilUsage' => 'required|integer',
            'electricityConversion' => 'nullable|decimal:1,1',
            'oilConversion' => 'nullable|decimal:1,1',
            'dayCreated' => 'required|integer',
            'monthCreated' => 'required|integer'
        ]);

        energyInfo::create([
            'electricityUsage' => $request->input('electricityUsage'),
            'oilUsage' => $request->input('oilUsage'),
            'electricityConversion' => $request->input('electricityConversion', 1.2),
            'oilConversion' => $request->input('oilConversion', 1.4),
            'dayCreated' => $request->input('dayCreated'),
            'monthCreated' => $request->input('monthCreated')
        ]);

        return redirect()->route('dashboard')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(energyInfo $energyInfo)
    {
        return view('energyInfo.show')->with('energyInfo', $energyInfo);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(energyInfo $energyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, energyInfo $energyInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(energyInfo $energyInfo)
    {
        //
    }
}
