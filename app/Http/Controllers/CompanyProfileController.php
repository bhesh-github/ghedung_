<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyProfile;

class CompanyProfileController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=CompanyProfile::first();
        return view('admin.company-profile.company-profile',compact("profile"));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
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
        $validated = $request->validate([
            'company_name' => 'required',
            'company_name_nepali' => 'required',
            // 'tibetan_lipi' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'address_nepali' => 'required',
            'introduction' => 'required',
            'map' => 'nullable',
            'facebook' => 'nullable',
            // 'twitter' => 'nullable',
            'youtube' => 'nullable',
            // 'instagram' => 'nullable',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $profile=CompanyProfile::first();
        $profile->company_name=$request->company_name;
        $profile->company_name_nepali=$request->company_name_nepali;
        $profile->tibetan_lipi=$request->tibetan_lipi;
        $profile->email=$request->email;
        $profile->phone=$request->phone;
        $profile->address=$request->address;
        $profile->address_nepali=$request->address_nepali;
        $profile->introduction=$request->introduction;
        // $profile->mission=$request->mission;
        // $profile->vision=$request->vision;
        // $profile->chairperson_message=$request->chairperson_message;
        $profile->map=$request->map;
        $profile->facebook=$request->facebook;
        // $profile->twitter=$request->twitter;
        // $profile->instagram=$request->instagram;
        $profile->youtube=$request->youtube;

        if($request->hasfile('company_logo')){
            $file=$request->file('company_logo');
            $filename=$file->getClientOriginalName(); //getting image extension
            // $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->company_logo=$filename;
        }
        if($request->hasfile('favicon')){
            $file=$request->file('favicon');
            $filename=$file->getClientOriginalName(); //getting image extension
            // $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->favicon=$filename;
        }
        if($request->hasfile('company_flag')){
            $file=$request->file('company_flag');
            $filename=$file->getClientOriginalName(); //getting image extension
            // $filename=time().'.'.$extension;
            $file->move('upload/images/company_profile/',$filename);
            $profile->company_flag=$filename;
        }
        // if($request->hasfile('chairperson')){
        //     $file=$request->file('chairperson');
        //     $filename=$file->getClientOriginalName(); //getting image extension
        //     // $filename=time().'.'.$extension;
        //     $file->move('upload/images/company_profile/',$filename);
        //     $profile->chairperson_image=$filename;
        // }

        $profile->update();
        return back()->with('success', 'Company Profile has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
