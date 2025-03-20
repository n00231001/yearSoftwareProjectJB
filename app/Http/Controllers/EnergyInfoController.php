<?php

namespace App\Http\Controllers;

use App\Models\energyInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EnergyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $energyInfo = energyInfo::all();
        return view('energyInfo.index', compact('energyInfo'));
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
            'electrictyUsage' => 'required|integer',
            'oilUsage' => 'required|integer',
            'gasUsage' => 'required|integer'
        ]);

        energyInfo::create([
            'electrictyUsage' => $request->input('electrictyUsage'),
            'oilUsage' => $request->input('oilUsage'),
            'gasUsage' => $request->input('gasUsage')
        ]);

        return redirect()->route('dashboard')->with('success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(energyInfo $energyInfo)
    {
        //
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
