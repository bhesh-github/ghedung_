<?php

namespace App\Http\Controllers;

use App\Models\Sallahakar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SallahakarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sallahakar = Sallahakar::latest()->get();
        return view('admin.sallahakar.index', compact("sallahakar"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sallahakar = Sallahakar::orderby('created_at', 'asc')->get();
        return view('admin.sallahakar.create', compact("sallahakar"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sallahakar = new Sallahakar;
        $sallahakar->name = $request->name;
        $sallahakar->email = $request->email;
        $sallahakar->phone = $request->phone;
        $sallahakar->address = $request->address;
        if ($request->status) {
            $sallahakar->status = "on";
        } else {
            $sallahakar->status = "off";
        }
        $sallahakar->save();
        return redirect()->route('sallahakar.index')->with('success', 'New Advisor has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sallahakar $sallahakar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sallahakar = Sallahakar::find($id);
        return view('admin.sallahakar.edit', compact("sallahakar"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $sallahakar = Sallahakar::find($request->id);
        $sallahakar->name = $request->name;
        $sallahakar->email = $request->email;
        $sallahakar->phone = $request->phone;
        $sallahakar->address = $request->address;
        if ($request->status) {
            $sallahakar->status = "on";
        } else {
            $sallahakar->status = "off";
        }
        $sallahakar->update();
        return redirect()->route('sallahakar.index')->with('success', 'Advisor has been updated successfully');
    }

    public function changeStatus($id)
    {
        $sallahakar = Sallahakar::find($id);
        if ($sallahakar->status == 'on') {
            $sallahakar->status = 'off';
        } elseif ($sallahakar->status == 'off') {
            $sallahakar->status = 'on';
        }
        $sallahakar->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $sallahakar = Sallahakar::find($id);
        $sallahakar->delete();
        return back()->with('success', 'Advisor has been removed successfully');
    }
}
