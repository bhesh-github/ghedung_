<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function articles()
    {
        $value = Article::where('status', 'on')->get();

        return response()->json($value);
    }

    public function details($slug)
    {
        $value = Article::where('slug', $slug)->first();
        $relateds = Article::where('status', 'on')->where('slug', '!=', $slug)->latest()->take(5)->get();
        $relateds = $relateds->shuffle();
        return response()->json([
            'details' => $value,
            'relateds' => $relateds
        ]);
    }
}
