<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $slider = '';
        return view('admin.slider.slider-add', compact('slider'));
    }

    public function show()
    {
        $slider = slider::all();
        return view('admin.slider.slider-show', compact('slider'));
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.slider-add', compact("slider"));
    }

    public function update(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required',
        //     // 'link' => 'required|url',
        //     // 'short_description' => 'required',
        //     // 'description' => 'required',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        $slider=Slider::find($request->id);
        $slider->title=$request->title;
        // $slider->link=$request->link;
        // $slider->short_description=$request->short_description;
        // $slider->description=$request->description;
        if($request->status){
            $slider->status = $request->status;
        }
        else{
            $slider->status = "off";
        }
        if($request->hasFile("image")){
            $image = $request->image;
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/images/slider', $imagename);
            // $request->image->move('product', $imagename);
            $slider->image = $imagename;
        }
        // if($request->hasfile('image')){
        //     $file=$request->file('image');
        //     $filename=$file->getClientOriginalName(); //getting image extension
        //     // $filename=time().'.'.$extension;
        //     $file->move('upload/images/slider/',$filename);
        //     $slider->image=$filename;
        // }
        $slider->save();
        return redirect()->route('slider.show')->with('success', 'Slider has been updated successfully');
    }

    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'title' => 'required',
        //     // 'link' => 'required|url',
        //     // 'short_description' => 'required',
        //     // 'description' => 'required',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        $slider = new Slider;
        $slider->title = $request->title;
        // $slider->link=$request->link;
        // $slider->short_description=$request->short_description;
        // $slider->description=$request->description;
        if ($request->status) {
            $slider->status = $request->status;
        } else {
            $slider->status = "off";
        }

        // $image = $request->image;
        // $imagename = time() . '.' . $image->getClientOriginalExtension();
        // $request->image->move('upload/images/slider', $imagename);
        // $request->image->move('product', $imagename);
        // $slider->image = $imagename;

        if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/slider/',$filename);
            $slider->image=$filename;
        }
        $slider->save();
        return redirect()->route('slider.show')->with('success', 'Product has been added successfully');
    }

    public function changeStatus($id)
    {
        $slider = Slider::find($id);
        if ($slider->status == 'on') {
            $slider->status = 'off';
        } elseif ($slider->status == 'off') {
            $slider->status = 'on';
        }
        $slider->update();
        return back()->with('success', 'Status has been changed successfully');
    }

    public function destroy(Request $request)
    {
        $slider = Slider::find($request->id);
        $slider->delete();
        return back()->with('success', 'Slider has been removed successfully');
    }
}
