<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact("galleries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new Gallery;
        $gallery->name = $request->name;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $gallery->id . '-' . Str::random(9);
        $gallery->slug = $slug;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/gallery', $filename);
            $gallery->image = $filename;

        }

        $gallery->save();
        return back()->with('success', 'Created Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $gallery = Gallery::findorfail($request->id);
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $gallery->id . '-' . Str::random(9);
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/gallery', $filename);
        } else {
            $filename = $gallery->image;
        }
        $gallery->update([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $filename
        ]);
        return back()->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id)
    {
        $gallery = Gallery::find($id);
        if ($gallery->status == 'on') {
            $gallery->status = 'off';
        } elseif ($gallery->status == 'off') {
            $gallery->status = 'on';
        }
        $gallery->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $gallery = Gallery::find($request->id);
        $gallery->delete();
        return back()->with('success', 'Removed successfully');
    }
}
