<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\DownloadType;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::latest()->get();
        $types = DownloadType::where('status','on')->get();
        return view('admin.download.download', compact("downloads","types"));
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
        if($request->hasfile('file')){
            $file=$request->file('file');
            $filename1=$file->getClientOriginalName(); //getting image extension
            $filename=time().'_'.$filename1;
            $file->move('upload/files/downloads/',$filename);
        }
        Download::create([
            'title' => $request->title,
            'download_type_id' => $request->download_type,
            'file' => $filename
        ]);

        return back()->with('success','Created Successfully.');
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
        $download = Download::findorfail($request->id);
        if($request->hasfile('file')){
            $file=$request->file('file');
            $filename1=$file->getClientOriginalName(); //getting image extension
            $filename=time().'_'.$filename1;
            $file->move('upload/files/downloads/',$filename);
        }
        else{
            $filename = $download->file;
        }
        $download->update([
            'title' => $request->title,
            'download_type_id' => $request->download_type,
            'file' => $filename
        ]);
        
        return back()->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function changeStatus($id){
        $download=Download::find($id);
        if($download->status == 'on'){
            $download->status='off';
        }
        elseif($download->status == 'off'){
            $download->status='on';
        }
        $download->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $download=Download::find($request->id);
        $download->delete();
        return back()->with('success', 'Removed successfully');
    }
}
