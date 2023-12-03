<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Video;


use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videos()
    {
        $value = Video::select('id', 'title', 'link', 'created_at')->where('status', 'on')->latest()->get();
        return response()->json($value);
    }
}
