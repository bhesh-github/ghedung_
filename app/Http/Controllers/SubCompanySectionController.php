<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\SubCompanySection;
use App\Models\SubCompany;
// use App\Models\SubCompanyTeam;
// use App\Models\SubCompanyActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCompanySectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($company_slug)
    {
        $sub_company = SubCompany::where('slug', $company_slug)->first();
        $company_sections = SubCompanySection::where('sub_company_id', $sub_company->id)->get();
        return view('admin.sub-company.sections.index', compact("sub_company", "company_sections"));
    }
    // public function section($sec_slug, $comp_slug)
    // {
    //     $sub_company_section = SubCompanySection::where('slug', $sec_slug)->first();
    //     $sub_company = SubCompany::where('slug', $comp_slug)->first();
    //     $sub_company_team = SubCompanyTeam::where('section_id', $sub_company_section->id)
    //         ->where('company_id', $sub_company->id)
    //         ->oldest()
    //         ->get();
    //     $sub_company_activity = SubCompanyActivity::where('section_id', $sub_company_section->id)
    //         ->where('company_id', $sub_company->id)
    //         ->oldest()
    //         ->get();
    //     if (!$sub_company_team->isEmpty()) {
    //         return view('admin.sub-company.sections.team.index', compact("sec_slug", "comp_slug", "sub_company_team", "sub_company"));
    //     } else if (!$sub_company_activity->isEmpty()) {
    //         return view('admin.sub-company.sections.activity.index', compact("sec_slug", "comp_slug", "sub_company_activity", "sub_company"));
    //     } else {
    //         return view('admin.sub-company.sections.not-found.index', compact('sec_slug', "comp_slug", "sub_company"));
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $section = new SubCompanySection;
        $section->section_name = $request->section_name;
        $section->sub_company_id = $request->sub_company_id;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $section->id . '-' . Str::random(9);
        $section->slug = $slug;
        if ($request->status) {
            $section->status = "on";
        } else {
            $section->status = "off";
        }
        $section->save();
        return back()->with('success', 'File Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCompanySection $subCompanySection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCompanySection $subCompanySection)
    {
        //
    }

    public function update(Request $request)
    {
        $section = SubCompanySection::find($request->id);
        $section->section_name = $request->section_name;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $section->id . '-' . Str::random(9);
        $section->slug = $slug;
        if ($request->status) {
            $section->status = "on";
        } else {
            $section->status = "off";
        }
        $section->update();
        return back()->with('success', 'File Updated successfully');
    }
    public function changeStatus($id)
    {
        $section = SubCompanySection::find($id);
        if ($section->status == 'on') {
            $section->status = 'off';
        } elseif ($section->status == 'off') {
            $section->status = 'on';
        }
        $section->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $section = SubCompanySection::find($request->id);
        $section->delete();
        return back()->with('success', 'Section has been removed successfully');
    }
}
