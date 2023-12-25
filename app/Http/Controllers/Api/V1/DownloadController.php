<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\DownloadType;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function downloads()
    {
        $value = DownloadType::where('status', 'on')->with('downloads', function ($row) {
            $row->where('status', 'on')->oldest()->get();
        })->oldest()->get();
        return response()->json($value);
    }
}
