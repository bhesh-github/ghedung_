<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SubCompany;
use App\Models\SubCompanyTeam;

use Illuminate\Http\Request;

class SubCompanyTeamController extends Controller
{
    public function teams($slug)
    {
        $sub_company = SubCompany::where('slug', $slug)->first();
        $value = SubCompanyTeam::select(
            'id',
            'name',
            'email',
            'designation',
            'introduction',
            'image',
            'facebook',
            'twitter',
            'instagram',
            'created_at'
        )->where('company_id', $sub_company->id)->where('status', 'on')->oldest()->get();
        return response()->json($value);
    }
}
