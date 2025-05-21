<?php

namespace App\Http\Controllers;

use App\Models\packages;
use App\Models\features;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = packages::all();
        return view('features.create', compact(('packages')));
        // return view('features.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'packageId' => 'required',
            'feature_name' => 'required',
            'feature_desc' => 'required',
            'feature_code' => 'required'
        ]);

        features::create($request->only(['packageId', 'feature_name', 'feature_desc', 'feature_code']));

        return redirect()->route('packages.index')->with('success', 'Post Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(features $features)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(features $features)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, features $features)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(features $features)
    {
        //
    }
}