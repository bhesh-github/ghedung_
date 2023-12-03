<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function activities()
    {
        $value = Activity::where('status', 'on')->get();
        return response()->json($value);
    }

    public function details($slug)
    {
        $value = Activity::where('slug', $slug)->first();
        $relateds = Activity::where('status', 'on')->where('slug', '!=', $slug)->latest()->take(5)->get();
        $relateds = $relateds->shuffle();
        return response()->json([
            'details' => $value,
            'relateds' => $relateds
        ]);
    }
}
