<?php

namespace App\Http\Controllers;

use App\Models\Samiti;
use App\Models\SamitiActivityPdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SamitiActivityPdfController extends Controller
{
    public function index($samiti_slug)
    {
        $samiti = Samiti::where('slug', $samiti_slug)->first();
        $activities = SamitiActivityPdf::where('samiti_id', $samiti->id)
            ->oldest()
            ->paginate(20);
        return view('admin.samiti.activity.index', compact("activities", "samiti"));

    }

    public function create($samiti_slug)
    {
        $samiti = Samiti::where('slug', $samiti_slug)->first();
        return view('admin.samiti.activity.create', compact("samiti"));
    }

    public function store(Request $request)
    {
        $activity = new SamitiActivityPdf;
        $activity->samiti_id = $request->samiti_id;
        $activity->title = $request->title;
        $slug = $activity->id . '-' . Str::random(9);
        $activity->slug = $slug;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $activity->file = $filename;
            $file->move('upload/files/samitis/activity', $filename);
        }
        if ($request->status) {
            $activity->status = "on";
        } else {
            $activity->status = "off";
        }
        $activity->save();
        return back()->with('success', 'File Added Successfully.');
        // return redirect()->route('samiti-member-card.index', $request->samiti_slug)->with('success', 'New Member has been added successfully');
    }

    public function update(Request $request)
    {
        $activity = SamitiActivityPdf::findorfail($request->id);
        $activity->title = $request->title;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/files/samitis/activity', $filename);
            $activity->file = $filename;
        } else {
            $filename = $activity->file;
        }
        $activity->update();
        return back()->with('success', 'File Updated successfully');
    }

    public function changeStatus($id)
    {
        $activity = SamitiActivityPdf::find($id);
        if ($activity->status == 'on') {
            $activity->status = 'off';
        } elseif ($activity->status == 'off') {
            $activity->status = 'on';
        }
        $activity->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $activity = SamitiActivityPdf::find($request->id);
        $activity->delete();
        return back()->with('success', 'File Removed successfully');
    }
}
