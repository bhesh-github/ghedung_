<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activity = Activity::latest()->get();
        return view('admin.activity.index', compact("activity"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activity = new Activity;
        $activity->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $activity->id . '-' . Str::random(9);
        $activity->slug = $slug;
        $activity->subtitle = $request->subtitle;
        $activity->activity_post_date = $request->activity_post_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/activity/', $filename);
            $activity->image = $filename;
        }
        $activity->description = $request->description;
        if ($request->status) {
            $activity->status = "on";
        } else {
            $activity->status = "off";
        }
        $activity->save();
        return redirect()->route('activity.index')->with('success', 'Activity has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = Activity::find($id);
        return view('admin.activity.edit', compact("activity"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $activity = Activity::find($request->id);
        $activity->title = $request->title;
        // Use the model's ID followed by a random 9-digit number as the slug
        $slug = $activity->id . '-' . Str::random(9);
        $activity->slug = $slug;
        $activity->subtitle = $request->subtitle;
        $activity->activity_post_date = $request->activity_post_date;
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/images/activity/', $filename);
            $activity->image = $filename;
        }
        $activity->description = $request->description;
        if ($request->status) {
            $activity->status = "on";
        } else {
            $activity->status = "off";
        }
        $activity->update();
        return redirect()->route('activity.index')->with('success', 'Activity has been updated successfully');
    }

    public function changeStatus($id)
    {
        $activity = Activity::find($id);
        if ($activity->status == 'on') {
            $activity->status = 'off';
        } elseif ($activity->status == 'off') {
            $activity->status = 'on';
        }
        $activity->update();
        return back()->with('success', 'Status has been changed successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $activity = Activity::find($request->id);
        $activity->delete();
        return back()->with('success', 'Activity has been removed successfully');
    }
}
