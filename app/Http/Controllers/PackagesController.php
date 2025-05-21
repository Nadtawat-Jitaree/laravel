<?php

namespace App\Http\Controllers;

use App\Models\packages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\features;
use Illuminate\Support\Facades\Log;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // รับค่าค้นหาจาก input

        $query = packages::query(); // เริ่ม query
        if (!empty($search)) {
            $query->where('package_name', 'like', '%' . $search . '%');
        }

        $packages = $query->paginate(10); // paginate ผลลัพธ์
        Log::debug("query", [$packages]);

        return view('packages.index', compact('packages', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_name' => 'required',
            'package_description' => 'required',
            'price' => 'required',
            'package_code' => 'required',
            'duration' => 'required'
        ]);

        // เพิ่มฟิลด์เองได้ที่นี่
        $data['status'] = 'AC';
        $data['amount_day'] = $data['duration'] === 'Y' ? 365 : 30;

        packages::create($data);

        return redirect()->route('packages.index')->with('success', 'เพิ่มข้อมูลแพ็กเกจสำเร็จ!');
    }

    /**
     * Display the specified resource.
     */
    public function show(packages $packages)
    {
        $search = $packages['id']; // รับค่าค้นหาจาก input

        $query = features::query();

        if (!empty($search)) {
            $query->where('packageId', $search);
        }

        $features = $query->paginate(10);

        return view('packages.show', compact('packages', 'features'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(packages $packages)
    {


        return view('packages.edit', compact('packages'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, packages $packages)
    {
        // เช็ค validate
        $data = $request->validate([
            'package_name' => 'required',
            'package_description' => 'required',
            'price' => 'required',
            'package_code' => 'required',
            'duration' => 'required',
        ]);
        $data['amount_day'] = $data['duration'] === 'Y' ? 365 : 30;

        $packages->update($data);

        return redirect()->route('packages.index')->with('success', 'Update Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(packages $packages)
    {
        //
    }
}