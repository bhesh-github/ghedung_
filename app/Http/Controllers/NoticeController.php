<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Notice::latest()->get();
        return view('admin.notice.index', compact("notice"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('admin.notice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notice = new Notice;
        $notice->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $notice->id . '-' . Str::random(9);
        $notice->slug = $slug;
        $notice->description = $request->description;
        // $notice->views = 0;
        if ($request->status) {
            $notice->status = "on";
        } else {
            $notice->status = "off";
        }
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/notice/', $filename);
            $notice->image = $filename;
        }
        $notice->save();
        return redirect()->route('notice.index')->with('success', 'Notice has been added successfully');
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
        $notice = Notice::find($id);
        return view('admin.notice.edit', compact("notice"));
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
        $notice = Notice::find($request->id);
        $notice->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $notice->id . '-' . Str::random(9);
        $notice->slug = $slug;
        // $slug = Str::slug($request->title);
        $notice->slug = $slug;
        $notice->description = $request->description;
        // $notice->views = 0;
        if ($request->status) {
            $notice->status = "on";
        } else {
            $notice->status = "off";
        }

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/news/', $filename);
            $notice->image = $filename;
        }

        $notice->update();
        return redirect()->route('notice.index')->with('success', 'Notice has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function changeStatus($id)
    {
        $notice = Notice::find($id);
        if ($notice->status == 'on') {
            $notice->status = 'off';
        } elseif ($notice->status == 'off') {
            $notice->status = 'on';
        }
        $notice->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $notice = Notice::find($request->id);
        $notice->delete();
        return back()->with('success', 'Notice has been removed successfully');
    }
}
