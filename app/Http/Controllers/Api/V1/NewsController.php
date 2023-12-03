<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function news()
    {
        $value = News::where('status', 'on')->latest()->get();
        return response()->json($value);
    }

    public function details($slug)
    {
        $value = News::where('slug', $slug)->first();
        $relateds = News::where('status', 'on')->where('slug', '!=', $slug)->latest()->take(5)->get();
        $relateds = $relateds->shuffle();
        return response()->json([
            'details' => $value,
            'relateds' => $relateds
        ]);
    }
}
