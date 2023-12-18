<?php

namespace App\Http\Controllers;

use App\Models\SubCompanyTeam;
use App\Models\SubCompany;
use App\Models\SubCompanySection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCompanyTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $team = SubCompanyTeam::oldest()->get();
        // return view('admin.sub-company.team.index', compact("team"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($sec_slug, $comp_slug)
    {
        $sub_company_section = SubCompanySection::where('slug', $sec_slug)->first();
        $sub_company = SubCompany::where('slug', $comp_slug)->first();
        return view('admin.sub-company.sections.team.create', compact("sub_company_section", "sub_company"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $team = new SubCompanyTeam;
        $team->section_id = $request->section_id;
        $team->company_id = $request->company_id;
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->designation = $request->designation;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/sub_company/team/', $filename);
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

        return redirect()->route('sub-company.section', [$request->section_slug, $request->company_slug])->with('success', 'New Member has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCompanyTeam $subCompanyTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $comp_slug, $sec_slug)
    {
        // comp_slug
        $sub_company_team = SubCompanyTeam::find($id);
        $sub_company = SubCompany::where('slug', $comp_slug)->first();
        return view('admin.sub-company.sections.team.edit', compact("sec_slug", "comp_slug", "sub_company_team", "sub_company"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $team = SubCompanyTeam::find($request->id);
        $team->name = $request->name;
        $team->email = $request->email;
        $team->phone = $request->phone;
        $team->designation = $request->designation;
        $team->introduction = $request->introduction;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/sub_company/team/', $filename);
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
        return redirect()->route('sub-company.section', ['sec_slug' => $request->section_slug, 'comp_slug' => $request->company_slug])->with('success', 'Member has been updated successfully');
        // return redirect()->route('team.index')->with('success', 'Member has been updated successfully');
        // return view('admin.sub-company.sections.team.index', compact("sec_slug", "sub_company_team", "sub_company"))->with('success', 'Member has been updated successfully');


    }

    public function changeStatus($id)
    {
        $team = SubCompanyTeam::find($id);
        if ($team->status == 'on') {
            $team->status = 'off';
        } elseif ($team->status == 'off') {
            $team->status = 'on';
        }
        $team->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $team = SubCompanyTeam::find($id);
        $team->delete();
        return back()->with('success', 'Member has been removed successfully');
    }
}
