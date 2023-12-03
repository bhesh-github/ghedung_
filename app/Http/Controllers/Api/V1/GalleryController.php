<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function gallery()
    {
        $gallery = Gallery::where('status', 'on')->latest()->get();

        return response()->json($gallery);
    }

    public function galleryImages($slug)
    {
        // $gallery = Gallery::where('status','on')->first();
        $gallery = Gallery::where('slug', $slug)->first();
        $images = GalleryImage::where('gallery_id', $gallery->id)->where('status', 'on')->latest()->get();

        return response()->json($images);
    }
}
