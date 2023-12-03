<?php

namespace App\Http\Controllers;

use App\Models\SubCompany;
use App\Models\SubCompanySection;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class SubCompanyController extends Controller
{
    public function index()
    {
        $sub_companies = SubCompany::latest()->get();
        return view('admin.sub-company.index', compact("sub_companies"));
    }

    public function profile($slug)
    {
        $sub_company = SubCompany::where('slug', $slug)->first();
        return view('admin.sub-company.profile', compact("sub_company"));
    }

    public function create()
    {
        return view('admin.sub-company.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            'introduction' => 'required',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $sub_company = new SubCompany;
        $sub_company->company_name = $request->company_name;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $sub_company->id . '-' . Str::random(9);
        $sub_company->slug = $slug;
        $sub_company->introduction = $request->introduction;
        if ($request->status) {
            $sub_company->status = "on";
        } else {
            $sub_company->status = "off";
        }
        if ($request->hasfile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName(); //getting image extension
            $file->move('upload/images/sub_company/company_profile/', $filename);
            $sub_company->company_logo = $filename;
        }
        $sub_company->save();
        return redirect()->route('sub-company.index')->with('success', 'Sub Company has been added successfully');
    }

    public function show(SubCompany $subCompany)
    {
        //
    }

    public function edit($id)
    {
        $sub_company = SubCompany::find($id);
        return view('admin.sub-company.edit', compact("sub_company"));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required',
            // 'email' => 'required|email',
            // 'phone' => 'required',
            // 'address' => 'required',
            'introduction' => 'required',
            'map' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
            'instagram' => 'nullable',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $sub_company = SubCompany::find($request->id);
        $sub_company->company_name = $request->company_name;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $sub_company->id . '-' . Str::random(9);
        $sub_company->slug = $slug;
        $sub_company->email = $request->email;
        $sub_company->phone = $request->phone;
        $sub_company->address = $request->address;
        $sub_company->introduction = $request->introduction;
        $sub_company->facebook = $request->facebook;
        $sub_company->twitter = $request->twitter;
        $sub_company->instagram = $request->instagram;
        $sub_company->youtube = $request->youtube;
        $sub_company->map = $request->map;
        if ($request->status) {
            $sub_company->status = "on";
        } else {
            $sub_company->status = "off";
        }
        if ($request->hasfile('company_logo')) {
            $file = $request->file('company_logo');
            $filename = $file->getClientOriginalName(); //getting image extension
            $file->move('upload/images/sub_company/company_profile/', $filename);
            $sub_company->company_logo = $filename;
        }
        $sub_company->update();
        return redirect()->route('sub-company.index')->with('success', 'Company has been updated successfully');

    }

    public function changeStatus($id)
    {
        $sub_company = SubCompany::find($id);
        if ($sub_company->status == 'on') {
            $sub_company->status = 'off';
        } elseif ($sub_company->status == 'off') {
            $sub_company->status = 'on';
        }
        $sub_company->update();
        return back()->with('success', 'Status has been changed successfully');

    }

    public function destroy(Request $request)
    {
        $sub_company = SubCompany::find($request->id);
        $sub_company->delete();
        return back()->with('success', 'Sub Company has been removed successfully');
    }

    // Sub Company Sections

}
