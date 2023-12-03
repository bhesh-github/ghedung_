<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DownloadType;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloads()
    {
        $value = DownloadType::where('status', 'on')->with('downloads', function ($q) {
            $q->where('status', 'on')->latest()->get();
        })->latest()->get();
        return response()->json($value);
    }
}
