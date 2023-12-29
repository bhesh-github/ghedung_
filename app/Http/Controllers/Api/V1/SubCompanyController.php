<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SubCompany;
use App\Models\SubCompanySection;

class SubCompanyController extends Controller
{
    public function details($slug)
    {
        $sub_company = SubCompany::where('slug', $slug)->first();

        $sections = SubCompanySection::where('sub_company_id', $sub_company->id)
            ->where('status', 'on')
            ->with(['sub_company_section_contents' => function ($query) {
                $query->where('status', 'on')->latest();
            }])
            ->oldest()
            ->get();

        return response()->json([
            'details' => $sub_company,
            'sections' => $sections,
        ]);
    }
}