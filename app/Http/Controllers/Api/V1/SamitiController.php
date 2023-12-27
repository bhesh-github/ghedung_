<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Samiti;
use App\Models\SamitiMemberCard;
use App\Models\SamitiActivityPdf;

use Illuminate\Http\Request;

class SamitiController extends Controller
{
    public function details($slug)
    {
        $samiti = Samiti::where('slug', $slug)->first();
        $memberCard = SamitiMemberCard::where('samiti_id', $samiti->id)->where('status', 'on')->oldest()->get();
        $activities = SamitiActivityPdf::where('samiti_id', $samiti->id)->where('status', 'on')->latest()->get();
        return response()->json([
            'details' => $samiti,
            'members_card' => $memberCard,
            'activities' => $activities,
        ]);

    }
}
