<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SubCompany;
use App\Models\Samiti;
use Illuminate\Http\Request;

class NavController extends Controller
{
    public function subCompanies()
    {
        $value = SubCompany::select('id', 'company_name', 'slug')->where('status', 'on')->oldest()->get();
        return response()->json($value);
    }
    public function samiti()
    {
        $value = Samiti::select('id', 'title', 'slug')->where('status', 'on')->oldest()->get();
        // return $value;
        return response()->json($value);
    }
}