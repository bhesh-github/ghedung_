<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SubCompany;
use App\Models\SubCompanyActivity;

use Illuminate\Http\Request;

class SubCompanyActivityController extends Controller
{
    public function activities($slug)
    {
        $sub_company = SubCompany::where('slug', $slug)->first();
        $value = SubCompanyActivity::where('company_id', $sub_company->id)->where('status', 'on')->latest()->get();
        return response()->json($value);
    }

    public function details($companySlug, $activitySlug)
    {
        $sub_company = SubCompany::where('slug', $companySlug)->first();
        $value = SubCompanyActivity::where('company_id', $sub_company->id)->where('slug', $activitySlug)->first();
        $relateds = SubCompanyActivity::where('company_id', $sub_company->id)->where('status', 'on')->where('slug', '!=', $activitySlug)->latest()->take(5)->get();
        $relateds = $relateds->shuffle();
        return response()->json([
            'details' => $value,
            'relateds' => $relateds
        ]);
    }
}
