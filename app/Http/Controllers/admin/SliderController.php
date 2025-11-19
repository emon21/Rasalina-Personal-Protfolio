<?php

namespace App\Http\Controllers\admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    //

    public function HomeSlider()
    {
        $homeSlider = Slider::latest()->get();
        return view('admin.Slider.index', data: ['homeSlider' => $homeSlider]);
    }

    public function create()
    {
        return view('admin.Slider.create');
    }
    public function store(Request $request, Slider $slider)
    {

        // return $request->video_link;
        // $request->validate([
        //     'title' => 'required',
        //     'short_description' => 'required',
        //     'videoUrl' => 'required',
        //     'sliderImage' => 'required',
        // ]);

        // return $request->video_link; 

        $slider->title = $request->title;
        $slider->short_title = $request->short_description;
        // $slider->video_url = $request->videoUrl;

        $slider->video_url = $request->video_link;
        //   $slider->video_url = $request->videoUrl;


        // $videoFile = $request->file('video');
        // $path = $videoFile->store('videos', 'public');
        // $slider->video_url = $path;

        // Image Path
        $path = null;

        # Image Upload
        if ($request->hasFile('sliderImage')) {

            // $image = $request->file('image');
            // $file = $image->move(public_path('uploads'), $image->getClientOriginalExtension());
            // 'profileImage'->$file

            //old image delete
            if ($slider->home_slide) {
                unlink(public_path($slider->home_slide));
            }

            //uploads image
            $file = $request->file('sliderImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider/'), $filename);
            // only file upload no foldername in database
            // $user->profileImage = $filename;
            //file upload in database path added hoby
            $path = 'uploads/slider/' . $filename;
            $slider->photo = $path;
        }



        $slider->save();

        # Toaster Helper Function Using
        flashToastr('success', 'Slider Create Successfully', 'Create Slider');
        return redirect()->route('admin.slider');
    }
    public function edit(Slider $slider)
    {

        return view('admin.Slider.edit', data: ['slider' => $slider]);
    }
    public function update(Request $request, Slider $slider)
    {
        // Image Path
        $path = null;

        // Handle Photo Upload
        $url = null;
        // if ($request->hasFile('sliderImage')) {

        //     //old image delete
        //     if ($slider->home_slide) {
        //         unlink(public_path($slider->home_slide));
        //     }

        //     # upload image

        //     $file = $request->file('sliderImage');
        //     $filename = time() . '.' . $file->getClientOriginalExtension();
        //     $url = $file->move('uploads/slider/', $filename);
        //     $slider->home_slide = $url;
        // }


        # Image Upload
        if ($request->hasFile('sliderImage')) {

            // $image = $request->file('image');
            // $file = $image->move(public_path('uploads'), $image->getClientOriginalExtension());
            // 'profileImage'->$file

            //old image delete
            // if ($slider->photo) {
            //     unlink(public_path($slider->photo));
            // }

            if(File::exists($slider->photo)){

                File::delete($slider->photo);

            }

            //uploads image
            $file = $request->file('sliderImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/home_slider'), $filename);
            // only file upload no foldername in database
            // $user->profileImage = $filename;
            //file upload in database path added hoby
            $path = 'uploads/home_slider/' . $filename;
            $slider->photo = $path;
        }


        $slider->title = $request->title;
        $slider->short_title = $request->short_description;
        $slider->video_url = $request->video_link;

        $slider->save();

        # Toaster Helper Function Using
        flashToastr('success', 'Slider Updated Successfully', 'Update Slider');
        return redirect()->route('admin.slider');
    }
    public function destroy(Slider $slider)
    {
        # delete Slider with image

        // Image delete
        if (File::exists($slider->photo)) {
            File::delete($slider->photo);
        }

        $slider->delete();

        # Toaster Helper Function Using
        flashToastr('error', 'Slider Deleted Successfully', 'Delete Slider');
        return redirect()->route('admin.slider');
    }
}
