<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Sallahakar;


use Illuminate\Http\Request;

class SallahakarController extends Controller
{
    public function sallahakar()
    {
        $value = Sallahakar::select(
            'id',
            'name',
            'email',
            'phone',
            'address',
            'created_at'
        )->where('status', 'on')->oldest()->get();
        return response()->json($value);
    }
}
