<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SubCompany;
use App\Models\SubCompanyTeam;
use App\Models\SubCompanyActivity;


use Illuminate\Http\Request;

class SubCompanyController extends Controller
{
    public function details($slug)
    {
        $value = SubCompany::where('slug', $slug)->first();
        $team = SubCompanyTeam::where('company_id', $value->id)->where('status', 'on')->oldest()->take(5)->get();
        $activities = SubCompanyActivity::where('company_id', $value->id)->where('status', 'on')->latest()->take(5)->get();
        return response()->json([
            'details' => $value,
            'team' => $team,
            'activities' => $activities,
        ]);
    }

    // public function teams($slug)
    // {
    //     $sub_company = SubCompany::where('slug', $slug)->first();
    //     $value = SubCompanyTeam::select(
    //         'id',
    //         'name',
    //         'email',
    //         'designation',
    //         'introduction',
    //         'image',
    //         'facebook',
    //         'twitter',
    //         'instagram',
    //         'created_at'
    //     )->where('company_id', $sub_company->id)->where('status', 'on')->oldest()->get();
    //     return response()->json($value);
    // }
}
