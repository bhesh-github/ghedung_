<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    public function profile()
    {
        $profile = CompanyProfile::first();
        return response()->json($profile);
    }
}
