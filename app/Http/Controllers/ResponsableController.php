<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $responsables = Responsable::all();
            return DataTables::of($responsables)->make();
        }
        return view('responsables.index');
    }

    /**
     * Get all responsables.
     */
    public function getResponsables() {
        $responsables = Responsable::all();
        return response()->json($responsables);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('responsables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $responsable = Responsable::create($request->all());
        return response()->json($responsable);
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsable $responsable)
    {
        // Deberías definir el cuerpo de este método si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $responsable = Responsable::find($id);
        return view('responsables.edit', compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $responsable)
    {
        $responsable = Responsable::find($responsable);
        $responsable->update($request->all());
        return response()->json($responsable);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($responsable)
    {
        Responsable::find($responsable)->delete();
        return response()->json('Ok');
    }
}
