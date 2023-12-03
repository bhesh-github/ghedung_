<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function getSliders()
    {
        $slider = slider::all();
        return response()->json($slider);
    }
    public function addContact(Request $request)
    {
        return response()->json('123');
    }
}
