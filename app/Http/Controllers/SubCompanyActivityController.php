<?php

namespace App\Http\Controllers;

use App\Models\SubCompanyActivity;
use App\Models\SubCompany;
use App\Models\SubCompanySection;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubCompanyActivityController extends Controller
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
    public function create($sec_slug, $comp_slug)
    {
        $sub_company = SubCompany::where('slug', $comp_slug)->first();
        $sub_company_section = SubCompanySection::where('slug', $sec_slug)->first();
        return view('admin.sub-company.sections.activity.create', compact("sub_company_section", "sub_company"));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sub_company_activity = new SubCompanyActivity;
        $sub_company_activity->section_id = $request->section_id;
        $sub_company_activity->company_id = $request->company_id;
        $sub_company_activity->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $sub_company_activity->id . '-' . Str::random(9);
        $sub_company_activity->slug = $slug;
        $sub_company_activity->subtitle = $request->subtitle;
        $sub_company_activity->activity_post_date = $request->activity_post_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/sub_company/activity/', $filename);
            $sub_company_activity->image = $filename;
        }
        $sub_company_activity->description = $request->description;
        if ($request->status) {
            $sub_company_activity->status = "on";
        } else {
            $sub_company_activity->status = "off";
        }
        $sub_company_activity->save();
        return redirect()->route('sub-company.section', [$request->section_slug, $request->company_slug])->with('success', 'New Member has been added successfully');

    }
    /**
     * Display the specified resource.
     */
    public function show(SubCompanyActivity $subCompanyActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $comp_slug, $sec_slug)
    {
        $sub_company_activity = SubCompanyActivity::find($id);
        $sub_company = SubCompany::where('slug', $comp_slug)->first();
        return view('admin.sub-company.sections.activity.edit', compact("sec_slug", "comp_slug", "sub_company_activity", "sub_company"));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $sub_company_activity = SubCompanyActivity::find($request->id);
        $sub_company_activity->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $sub_company_activity->id . '-' . Str::random(9);
        $sub_company_activity->slug = $slug;
        $sub_company_activity->subtitle = $request->subtitle;
        $sub_company_activity->activity_post_date = $request->activity_post_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/sub_company/activity/', $filename);
            $sub_company_activity->image = $filename;
        }
        $sub_company_activity->description = $request->description;
        if ($request->status) {
            $sub_company_activity->status = "on";
        } else {
            $sub_company_activity->status = "off";
        }
        $sub_company_activity->update();
        return redirect()->route('sub-company.section', ['sec_slug' => $request->section_slug, 'comp_slug' => $request->company_slug])->with('success', 'Member has been updated successfully');

        // return redirect()->route('activity.index')->with('success', 'Activity has been updated successfully');
    }

    public function changeStatus($id)
    {
        $sub_company_activity = SubCompanyActivity::find($id);
        if ($sub_company_activity->status == 'on') {
            $sub_company_activity->status = 'off';
        } elseif ($sub_company_activity->status == 'off') {
            $sub_company_activity->status = 'on';
        }
        $sub_company_activity->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $sub_company_activity = SubCompanyActivity::find($request->id);
        $sub_company_activity->delete();
        return back()->with('success', 'Activity has been removed successfully');
    }
}
