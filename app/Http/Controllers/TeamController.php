<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;


class TeamController extends Controller
{
    public function index()
    {
        $team = Team::oldest()->get();
        return view('admin.team.index', compact("team"));
        // return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        // return view('admin.team.create');
        $team = Team::orderby('created_at', 'asc')->get();
        return view('admin.team.create', compact("team"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team;
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->designation = $request->designation;
        $team->introduction = $request->introduction;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/team/', $filename);
            $team->image = $filename;
        }
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        if ($request->status) {
            $team->status = "on";
        } else {
            $team->status = "off";
        }
        $team->save();
        return redirect()->route('team.index')->with('success', 'New Member has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.team.edit', compact("team"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $team = Team::find($request->id);
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->designation = $request->designation;
        $team->introduction = $request->introduction;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/team/', $filename);
            $team->image = $filename;
        }
        $team->facebook = $request->facebook;
        $team->twitter = $request->twitter;
        $team->instagram = $request->instagram;
        if ($request->status) {
            $team->status = "on";
        } else {
            $team->status = "off";
        }
        $team->update();
        return redirect()->route('team.index')->with('success', 'Member has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id)
    {
        $team = Team::find($id);
        if ($team->status == 'on') {
            $team->status = 'off';
        } elseif ($team->status == 'off') {
            $team->status = 'on';
        }
        $team->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request, $id)
    {
        $team = Team::find($id);
        $team->delete();
        return back()->with('success', 'Member has been removed successfully');
    }
}