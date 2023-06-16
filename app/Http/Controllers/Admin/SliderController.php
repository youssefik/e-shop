<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\SliderFormRequest;


use App\Models\Slider;


class SliderController extends Controller
{
    function index()  {

        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
    }

    function create()  {

        return view('admin.slider.create');
    }

    function store(Request $request)  {

        // $validatedData = $request->validated();

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() .'.'. $ext;
        //     $file->move('uploads/slider/',$filename);
        //     $validatedData['image'] ="uploads/slider/$filename";
        // }
        // $validatedData['status'] = $request->status == true ? '1' : '0';


                $slider = new Slider();
                $slider->title = $request->title;
                $slider->description =  $request->description;
                $slider->status =  $request->status == true ? '1' : '0';
                if($request->hasFile('image')){
                    $file = $request->file('image');
                    $ext = $file->getClientOriginalExtension();

                    $filename = time().'.' .$ext;

                    $file->move('assets/uploads/slider',$filename);

                    $slider->image = $filename;
                }
                $slider->save();


        // Slider::create([
        //     'title' => $validatedData['title'],
        //     'description' => $validatedData['description'],
        //     'image' => $validatedData['image'],
        //     'status' => $validatedData['status']
        // ]);
        // dd( $slider->status,$slider->image);
        return redirect('/sliders')->with('status','Slider Added Successfuly');
    }


    function edit(Slider $slider){

        return  view('admin.slider.edit',compact('slider'));
    }

    function update(Slider $slider, Request $request)
    {
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->status = $request->status == true ? '1' : '0';

        if ($request->hasFile('image')) {
            $file = $request->file('image');

            if ($file->isValid()) {
                $destinationPath = 'assets/uploads/slider';
                $oldImagePath = $slider->image;

                if ($oldImagePath && File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;

                $file->move('assets/uploads/slider',$filename);

                $slider->image = $filename;
            }
        }

        $slider->save();

        return redirect('/sliders')->with('status', 'Slider Updated Successfully');
    }

    function destroy($id){
        $slider = Slider::find($id);

        if($slider->image){

            $path = 'assets/uploads/slider/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $slider->delete();
        return redirect('sliders')->with('status','Slider Deleted successfuly');
    }
}
