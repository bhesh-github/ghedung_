<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Video;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));

    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $video = new Video;
        $video->title = $request->title;
        $video->link = $request->link;
        if ($request->show_in_home) {
            $video->show_in_home = "on";
        } else {
            $video->show_in_home = "off";
        }
        if ($request->status) {
            $video->status = "on";
        } else {
            $video->status = "off";
        }
        $video->save();
        // return back()->with('success', $request->link);
        return redirect()->route('video.index')->with('success', 'Video Added Successfully.');


        // $slug = Str::slug($request->name);
        // if($request->hasfile('image')){
        //     $file=$request->file('image');
        //     $filename1=$file->getClientOriginalName(); //getting image extension
        //     $filename=time().'_'.$filename1;
        //     $file->move('upload/videos',$filename);
        // }
        // GalleryVideos::create([
        //     'name' => $request->name,
        //     'slug' => $slug,
        //     'image' => $filename
        // ]);
        // return back()->with('success','Created Successfully.');
    }

    public function edit($id)
    {
        $video = Video::find($id);
        return view('admin.videos.edit', compact("video"));
    }

    public function update(Request $request)
    {
        $video = Video::find($request->id);
        $video->title = $request->title;
        $video->link = $request->link;
        if ($request->show_in_home) {
            $video->show_in_home = "on";
        } else {
            $video->show_in_home = "off";
        }
        if ($request->status) {
            $video->status = "on";
        } else {
            $video->status = "off";
        }
        $video->update();
        return redirect()->route('video.index')->with('success', 'Video has been updated successfully');
    }

    public function changeShowInHome($id)
    {
        $show_in_home = Video::find($id);
        if ($show_in_home->show_in_home == 'on') {
            $show_in_home->show_in_home = 'off';
        } elseif ($show_in_home->show_in_home == 'off') {
            $show_in_home->show_in_home = 'on';
        }
        $show_in_home->update();
        return back()->with('success', 'Show In Home has been changed successfully');
    }

    public function changeStatus($id)
    {
        $video = Video::find($id);
        if ($video->status == 'on') {
            $video->status = 'off';
        } elseif ($video->status == 'off') {
            $video->status = 'on';
        }
        $video->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $video = Video::find($request->id);
        $video->delete();
        return back()->with('success', 'video has been removed successfully');
    }
}
