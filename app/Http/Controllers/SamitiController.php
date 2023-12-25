<?php

namespace App\Http\Controllers;

use App\Models\Samiti;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SamitiController extends Controller
{
    public function index()
    {
        $samitis = Samiti::oldest()->get();
        return view('admin.samiti.samitis', compact("samitis"));
    }

    public function store(Request $request)
    {
        $samiti = new Samiti;
        $samiti->title = $request->title;
        $slug = $samiti->id . '-' . Str::random(9);
        $samiti->slug = $slug;

        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $samiti->samiti_pdf = $filename;
            $file->move('upload/files/samitis/', $filename);
        }
        if ($request->status) {
            $samiti->status = $request->status;
        } else {
            $samiti->status = "off";
        }
        $samiti->save();
        return back()->with('success', 'Created Successfully.');
    }

    public function update(Request $request)
    {
        $samiti = Samiti::findorfail($request->id);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            $filename1 = $file->getClientOriginalName(); //getting image extension
            $filename = time() . '_' . $filename1;
            $file->move('upload/files/samitis/', $filename);
        } else {
            $filename = $samiti->file;
        }
        $samiti->update([
            'title' => $request->title,
            'slug' => $request->id . '-' . Str::random(9),
            'samiti_pdf' => $filename
        ]);
        return back()->with('success', 'Updated successfully');
    }

    public function changeStatus($id)
    {
        $samiti = Samiti::find($id);
        if ($samiti->status == 'on') {
            $samiti->status = 'off';
        } elseif ($samiti->status == 'off') {
            $samiti->status = 'on';
        }
        $samiti->update();
        return back()->with('success', 'Status has been changed successfully');
    }
    public function destroy(Request $request)
    {
        $samiti = Samiti::find($request->id);
        $samiti->delete();
        return back()->with('success', 'Removed successfully');
    }
}
