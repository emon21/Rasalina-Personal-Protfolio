<?php

namespace App\Http\Controllers\home;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    //

    public function About(){

        $about = About::find(5);
        // return $about;

        return view('admin.about.about_page',compact('about'));

    }

    

    # Update About
    public function AboutUpdate(Request $request,$id){

        // return $request->all();
      
        $about = About::find($id);
        $about->title               = $request->title;
        $about->short_title         = $request->short_title;
        $about->short_description   = $request->short_description;
        $about->long_description    = $request->long_description;

        // $about->about_image = $request->title;
        # Image Upload
        if ($request->hasFile('aboutImage')) {

            // $image = $request->file('image');
            // $file = $image->move(public_path('uploads'), $image->getClientOriginalExtension());
            // 'profileImage'->$file

            //old image delete
            if (File::exists($about->about_image)) {
                File::delete($about->about_image);
            }

            //uploads image
            $file = $request->file('aboutImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/about'), $filename);
            // only file upload no foldername in database
            $path = 'uploads/about/' . $filename;
            $about->about_image = $path;
        }

        $about->save();

        # Toaster Helper Function Using
        flashToastr('success', 'About Page Updated Successfully', 'Update Page');
        return redirect()->route('about.page');

        // return redirect()->route('about.page')->with('success','About Updated Successfully');


    }
}
