<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\SubCompany;
use App\Models\SubCompanySection;
use App\Models\SubCompanySectionContent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCompanySectionContentController extends Controller
{
    public function index($company_slug, $section_slug)
    {
        $sub_company = SubCompany::where('slug', $company_slug)->first();
        $sub_company_section = SubCompanySection::where('slug', $section_slug)->first();
        $section_contents = SubCompanySectionContent::where('sub_company_id', $sub_company->id)->where('sub_company_section_id', $sub_company_section->id)->latest()->paginate(20);
        return view('admin.sub-company.sections.section-content.index', compact("sub_company", "sub_company_section", "section_contents"));
    }

    public function store(Request $request)
    {
        $section_content = new SubCompanySectionContent;
        $section_content->sub_company_id = $request->sub_company_id;
        $section_content->sub_company_section_id = $request->sub_company_section_id;
        $section_content->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $section_content->id . '-' . Str::random(9);
        $section_content->slug = $slug;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/sub_company/section_content/', $filename);
            $section_content->image = $filename;
        }
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $section_content->pdf = $filename;
            $file->move('upload/files/sub_company/section_content/', $filename);
        }
        if ($request->status) {
            $section_content->status = "on";
        } else {
            $section_content->status = "off";
        }
        $section_content->save();
        return back()->with('success', 'File Added Successfully.');
    }

    public function update(Request $request)
    {
        $section_content = SubCompanySectionContent::find($request->id);
        $section_content->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $section_content->id . '-' . Str::random(9);
        $section_content->slug = $slug;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/sub_company/section_content', $filename);
            $section_content->image = $filename;
        } else {
            $filename = $section_content->image;
            $section_content->image = $filename;
        }
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/files/sub_company/section_content', $filename);
            $section_content->pdf = $filename;
        } else {
            $filename = $section_content->pdf;
            $section_content->pdf = $filename;
        }
        if ($request->status) {
            $section_content->status = "on";
        } else {
            $section_content->status = "off";
        }
        $section_content->update();
        return back()->with('success', 'File Updated successfully');
    }
    public function changeStatus($id)
    {
        $section_content = SubCompanySectionContent::find($id);
        if ($section_content->status == 'on') {
            $section_content->status = 'off';
        } elseif ($section_content->status == 'off') {
            $section_content->status = 'on';
        }
        $section_content->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $section_content = SubCompanySectionContent::find($request->id);
        $section_content->delete();
        return back()->with('success', 'File removed successfully');
    }
}
