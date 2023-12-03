<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $gallery = Gallery::where('slug', $slug)->first();
        $images = GalleryImage::where('gallery_id', $gallery->id)->latest()->get();

        return view('admin.gallery.images', compact("gallery", "images"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('images')) {
            $images = $request->images;
            foreach ($images as $key => $image) {
                $filename = time() . $key . $image->getClientOriginalName();
                // $filename = $image->getClientOriginalName();
                $image->move('upload/images/gallery/', $filename);

                $gallery = new GalleryImage();
                $gallery->gallery_id = $request->id;
                $gallery->image = $filename;
                $gallery->save();
            }
        }
        return back()->with('success', 'Images has been uploaded to gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gallery = GalleryImage::findOrfail($id);
        $gallery->delete();
        return back()->with('success', 'Deleted Successfully');
    }

    public function status($id)
    {
        $gallery = GalleryImage::findOrfail($id);
        if ($gallery->status == 'on') {
            $status = 'off';
        } else {
            $status = 'on';
        }
        $gallery->update([
            'status' => $status
        ]);
        return back()->with('success', 'Status Updated Successfully');
    }
}
