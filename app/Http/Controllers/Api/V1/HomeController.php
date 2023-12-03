<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\News;
use App\Models\Video;
use App\Models\Notice;
use App\Models\Article;
use App\Models\Team;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function slider()
    {
        $value = Slider::where('status', 'on')->latest()->get();
        return response()->json($value);
    }

    public function news()
    {
        $value = News::select('id', 'title', 'slug', 'image', 'created_at')->where('status', 'on')->latest()->take(7)->get();
        return response()->json($value);
    }
    public function videos()
    {
        $value = Video::select('id', 'title', 'link', 'created_at')->where('show_in_home', 'on')->where('status', 'on')->latest()->take(3)->get();
        return response()->json($value);
    }
    public function notices()
    {
        $value = Notice::select('id', 'title', 'slug', 'image', 'description', 'views', 'created_at')->where('status', 'on')->latest()->take(5)->get();
        return response()->json($value);
    }
    public function articles()
    {
        $value = Article::select('id', 'title', 'slug', 'subtitle', 'image', 'description', 'writer_name', 'writer_address', 'writer_image', 'article_post_date', 'shares', 'created_at')->where('status', 'on')->latest()->take(3)->get();
        return response()->json($value);
    }
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
        )->where('status', 'on')->oldest()->take(7)->get();
        return response()->json($value);
    }
}
