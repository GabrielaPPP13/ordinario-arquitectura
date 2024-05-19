<?php

namespace App\Http\Controllers;

use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $educationLevels = EducationLevel::all();
            return DataTables::of($educationLevels)->make();
        }
        return view('educationLevels.index');
    }

    public function getEducationLevels() {
        $educationLevels = EducationLevel::all();
        return response()->json($educationLevels);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('educationLevels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $educationLevel = EducationLevel::create($request->all());
        return response()->json($educationLevel);
    }

    /**
     * Display the specified resource.
     */
    public function show(EducationLevel $educationLevel)
    {
        //
    }

    public function edit($id)
    {
        $educationLevel = EducationLevel::find($id);
        return view('educationLevels.edit', compact('educationLevel'));
    }
    
    public function update(Request $request, int $educationLevel)
    {
        $educationLevel = EducationLevel::find($educationLevel);
        $educationLevel->update($request->all());
        return response()->json($educationLevel);
    }

    public function destroy($educationLevel)
    {
        EducationLevel::find($educationLevel)->delete();
        return response()->json('Ok');
    }
}
