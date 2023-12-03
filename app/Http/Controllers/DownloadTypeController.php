<?php

namespace App\Http\Controllers;

use App\Models\DownloadType;
use Illuminate\Http\Request;

class DownloadTypeController extends Controller
{
    public function index()
    {
        $types = DownloadType::latest()->get();

        return view('admin.download.type',compact("types"));
    }

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
        DownloadType::create([
            'title' => $request->title,
        ]);

        return back()->with('success','Created Successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $type = DownloadType::findorfail($request->id);
        $type->update([
            'title' => $request->title,
        ]);

        return back()->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id){
        $type=DownloadType::find($id);
        if($type->status == 'on'){
            $type->status='off';
        }
        elseif($type->status == 'off'){
            $type->status='on';
        }
        $type->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $type=DownloadType::find($request->id);
        $type->delete();
        return back()->with('success', 'Removed successfully');
    }
}
