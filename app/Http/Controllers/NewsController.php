<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\News;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact("news"));
        // return response()->json($news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        $news->title = $request->title;
        // $slug = Str::slug($request->title);
        // $news->slug = $slug;
        // $slug = $news->slug;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $news->id . '-' . Str::random(9);
        $news->slug = $slug;
        $news->description = $request->description;
        if ($request->status) {
            $news->status = "on";
        } else {
            $news->status = "off";
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/news/', $filename);
            $news->image = $filename;
        }
        $news->save();
        return redirect()->route('news.index')->with('success', 'News has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('admin.news.edit', compact("news"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $news = News::find($request->id);
        $news->title = $request->title;
        // $slug = Str::slug($request->title);
        // $news->slug = $slug;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $news->id . '-' . Str::random(9);
        $news->slug = $slug;
        $news->description = $request->description;
        if ($request->status) {
            $news->status = "on";
        } else {
            $news->status = "off";
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/news/', $filename);
            $news->image = $filename;
        }
        $news->update();
        return redirect()->route('news.index')->with('success', 'News has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id)
    {
        $news = News::find($id);
        if ($news->status == 'on') {
            $news->status = 'off';
        } elseif ($news->status == 'off') {
            $news->status = 'on';
        }
        $news->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $news = News::find($request->id);
        $news->delete();
        return back()->with('success', 'News has been removed successfully');
    }
}