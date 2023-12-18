<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\SubCompany;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function subCompanies()
    {
        $value = SubCompany::select('id','company_name','slug')->where('status','on')->get();
        return response()->json($value);
    }
}
