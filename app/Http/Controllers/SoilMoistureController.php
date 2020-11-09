<?php

namespace App\Http\Controllers;

use App\SoilMoisture;
use Illuminate\Http\Request;

class SoilMoistureController extends Controller
{
    public function __invoke()
    {
        return 'soil moisture invoke';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoilMoisture  $soilMoisture
     * @return \Illuminate\Http\Response
     */
    public function show(SoilMoisture $soilMoisture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoilMoisture  $soilMoisture
     * @return \Illuminate\Http\Response
     */
    public function edit(SoilMoisture $soilMoisture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoilMoisture  $soilMoisture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoilMoisture $soilMoisture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoilMoisture  $soilMoisture
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoilMoisture $soilMoisture)
    {
        //
    }
}
