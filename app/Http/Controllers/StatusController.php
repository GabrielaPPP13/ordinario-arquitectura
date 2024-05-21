<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $statuses = Status::all();
            return DataTables::of($statuses)->make();
        }
        return view('statuses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = Status::create($request->all());
        return response()->json($status);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $status = Status::find($id);
        return view('statuses.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $status)
    {
        $status = Status::find($status);
        $status->update($request->all());
        return response()->json($status);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($status)
    {
        Status::find($status)->delete();
        return response()->json('Ok');
    }
}
