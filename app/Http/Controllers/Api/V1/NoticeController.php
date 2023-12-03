<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function notices()
    {
        $value = Notice::where('status', 'on')->latest()->get();
        return response()->json($value);
    }

    public function details($slug)
    {
        $value = Notice::where('slug', $slug)->first();
        $relateds = Notice::where('status', 'on')->where('slug', '!=', $slug)->latest()->take(5)->get();
        $relateds = $relateds->shuffle();
        return response()->json([
            'details' => $value,
            'relateds' => $relateds
        ]);
    }
}
