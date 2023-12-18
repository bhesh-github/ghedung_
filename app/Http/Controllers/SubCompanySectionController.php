<?php

namespace App\Http\Controllers;

use App\Models\SubCompanySection;
use App\Models\SubCompany;
use App\Models\SubCompanyTeam;
use App\Models\SubCompanyActivity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCompanySectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $sub_company = SubCompany::where('slug', $slug)->first();
        $company_sections = SubCompanySection::get();
        return view('admin.sub-company.sections.index', compact("sub_company", "company_sections"));
    }
    public function section($sec_slug, $comp_slug)
    {
        $sub_company_section = SubCompanySection::where('slug', $sec_slug)->first();
        $sub_company = SubCompany::where('slug', $comp_slug)->first();
        $sub_company_team = SubCompanyTeam::where('section_id', $sub_company_section->id)
            ->where('company_id', $sub_company->id)
            ->oldest()
            ->get();
        $sub_company_activity = SubCompanyActivity::where('section_id', $sub_company_section->id)
            ->where('company_id', $sub_company->id)
            ->oldest()
            ->get();
        if (!$sub_company_team->isEmpty()) {
            return view('admin.sub-company.sections.team.index', compact("sec_slug", "comp_slug", "sub_company_team", "sub_company"));
        } else if (!$sub_company_activity->isEmpty()) {
            return view('admin.sub-company.sections.activity.index', compact("sec_slug", "comp_slug", "sub_company_activity", "sub_company"));
        } else {
            return view('admin.sub-company.sections.not-found.index', compact('sec_slug', "comp_slug", "sub_company"));
        }
    }

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
        //
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCompanySection $subCompanySection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCompanySection $subCompanySection)
    {
        //
    }
}
