<?php

namespace App\Http\Controllers\home;

use App\Models\About;
use App\Models\MultiImage;
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

    # AboutMultiImage
    public function AboutMultiImage(){
        return view('admin.about.multiImage');
    }
    
    public function StoreMultiImage(Request $request){


        // ✅ Validate images
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = $request->File('multiImage');
        $uploadedFiles = [];

        # multiple image upload
        foreach($image AS $multiImage){
            // $filename = time() . uniqid().'.' . $multiImage->getClientOriginalExtension();
            $filename = rand(100000,999999).'.' . $multiImage->getClientOriginalExtension();
            $multiImage->move(public_path('uploads/multi'), $filename);
            // $path = 'uploads/multi/' . $filename;
            $path = 'uploads/multi/'.$filename;
            $uploadedFiles[] = $filename;

            MultiImage::create([
                'multiImage' => $path
            ]);
        }



        # Toaster Helper Function Using
        flashToastr('success', 'Multiple Image Created Successfully !!', 'Store Image');
        // return redirect()->route('about.multi.image');
        return back()->with('files', $uploadedFiles);

        
    } // End Method

    # all.multi.image

    public function AllMultiImage(){
        $allMultiImage  = MultiImage::all();
        return view('admin.about.all_multi_image',compact('allMultiImage'));
    }

    # Edit Multi Image
    public function EditMultiImage($edit){

        $editMultiImage = MultiImage::find($edit);
        return view('admin.about.edit_multi_image', compact('editMultiImage'));
    }
    
    # Update Multi Image
    public function UpdateMultiImage(Request $request,$update){

        $images = MultiImage::find($update);

        $image = $request->File('multiImage');
        $uploadedFiles = [];

        # multiple image upload
        foreach ($image as $multiImage) {

            # old image delete
            if (File::exists($images->multiImage)) {
                File::delete($images->multiImage);
            }

            # upload Image
            $filename = rand(100000, 999999) . '.' . $multiImage->getClientOriginalExtension();
            $multiImage->move(public_path('uploads/multi'), $filename);
            // $path = 'uploads/multi/' . $filename;
            $path = 'uploads/multi/' . $filename;
            $uploadedFiles[] = $filename;

            # update database
            $images->multiImage = $path;
            $images->save();

        }

        # Toaster Helper Function Using
        flashToastr('success', 'Multiple Image Created Successfully !!', 'Update Image');
        // flashToastr[
        //     'type' => 'success',
        //     'message' => 'Multiple Image Created Successfully !!',
        //     'title' => 'Update Image'
        // ];
        // return redirect()->route('about.multi.image');
        return redirect()->route('about.multi.image')->with('files', $uploadedFiles);

    }


    # Delete Multi Image
    public function DeleteMultiImage($delete) {

        // return MultiImage::find($delete);

        // delete multi image
        $image = MultiImage::find($delete);
        $imagePath = $image->multiImage;

        // old image delete
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // delete from database
        $image->delete();

        # Toaster Helper Function Using
        flashToastr('success', 'Multi Image Deleted Successfully !!', 'Delete Image');
        return back();


    }
}
