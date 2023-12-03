<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Team;


use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teams()
    {
        $value = Team::select(
            'id',
            'name',
            'email',
            'designation',
            'introduction',
            'image',
            'facebook',
            'twitter',
            'instagram',
            'created_at'
        )->where('status', 'on')->oldest()->get();
        return response()->json($value);
    }
}
