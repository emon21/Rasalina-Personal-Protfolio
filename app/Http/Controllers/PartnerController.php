<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Support\Str;
use App\Models\PartnerImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    //

    public function index() {
        $partner = Partner::with('images')->first();
        // return $partner;
        return view('admin.partner.index', compact('partner'));
        
    }


    public function create()
    {
        $partner = Partner::first();

        // if ($partner) {
        //     return redirect()->route('admin.partner');
        // }


        return view('admin.partner.create',['partner' => $partner]);
    }

    public function store(Request $request) {

        // $partner = new Partner();
        // $partner->title = $request->title;
        // $partner->short_description = $request->short_description;
        // $partner->save();
        // return redirect()->route('admin.partner');

        
        $partner = Partner::first();

        $image = $request->File('images');
        $uploadedFiles = [];

        # multiple image upload
        foreach ($image as $multiImage) {


            # upload Image
            $filename = rand(100000, 999999) . '.' . $multiImage->getClientOriginalExtension();
            $multiImage->move(public_path('uploads/partners'), $filename);
            // $path = 'uploads/multi/' . $filename;
            $path = 'uploads/partners/' . $filename;
            $uploadedFiles[] = $filename;

            # update database
            // $images->multiImage = $path;
            // $images->save();

            PartnerImage::create([
                        'partner_id' => $partner->id,
                        'file' => $path,
                        // 'alt' => $imageFile->getClientOriginalName(),
                        // 'sort_order' => $index,
                    ]);
        }

        return redirect()->route('admin.partner');




        // DB::transaction(function () use ($request) {
        //   //  $partner = Partner::create($request->only('name', 'website', 'description'));

        //      $partner = Partner::first();

        //     if ($request->hasFile('images')) {
        //         foreach ($request->file('images') as $index => $imageFile) {

        //             $filename = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();
        //             $path = $imageFile->storeAs("public/uploads/partners/{$partner->id}", $filename);
        //             // storeAs returns path like 'public/partners/1/uuid.jpg'
        //             // If you want to store without 'public/' prefix, you can substr it.
        //             PartnerImage::create([
        //                 'partner_id' => $partner->id,
        //                 'file' => $path,
        //                 'alt' => $imageFile->getClientOriginalName(),
        //                 'sort_order' => $index,
        //             ]);
        //         }
        //     }
        // });


    }
    
    public function edit(Partner $partner) {

        $partner->load('images');

        // return $partner;

        return view('admin.partner.edit', compact('partner'));
        
    }
    
    public function update(Request $request,Partner $partner) {

        // $partner->title = $request->title;
        // $partner->short_description = $request->short_description;
        // $partner->save();



        // New uploads
        // if ($request->hasFile('images')) {
        //     foreach ($request->file('images') as  $imageFile) {
        //         $filename = Str::uuid() . '.' . $imageFile->getClientOriginalExtension();
        //         $imageFile->move(public_path("uploads/partners{$partner->id}"), $filename);
        //         $path = 'uploads/partners/' . $filename;

        //       //  $path = $imageFile->storeAs("uploads/partners/{$partner->id}", $filename);
        //         PartnerImage::create([
        //             'partner_id' => $partner->id,
        //             'file' => $path,

        //         ]);
        //     }
        // }

        // return redirect()->route('admin.partner.edit', $partner)->with('success', 'Partner updated.');

        // 1️⃣ Delete old images
        if ($request->filled('deleted_images')) {
            $ids = explode(',', $request->deleted_images);
            foreach ($ids as $id) {
                $img = $partner->images()->find($id);
                if ($img) {
                    if (file_exists(public_path($img->file))) {
                        unlink(public_path($img->file));
                    }
                    $img->delete();
                }
            }
        }

        // 2️⃣ Replace existing images
        if ($request->hasFile('update_images')) {
            foreach ($request->file('update_images') as $id => $file) {
                $img = $partner->images()->find($id);
                if ($img) {
                    if (file_exists(public_path($img->file))) {
                        unlink(public_path($img->file));
                    }
                    $path = $file->move('uploads/partners', 'partner_' . time() . '_' . $file->getClientOriginalName());
                    $img->update(['file' => $path]);
                }
            }
        }

        // 3️⃣ Add new images
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $path = $file->move('uploads/partners', 'partner_' . time() . '_' . $file->getClientOriginalName());
                $partner->images()->create(['file' => $path]);
            }
        }

        return back()->with('success', 'Partner updated successfully!');

        
    }

    public function demo(){

        return "demo user";
    }


    // delete a single image (AJAX)
    public function destroyImage(PartnerImage $image)
    {
        // because of model boot deleting callback, file will be removed
        $image->delete();
        return response()->json(['status' => 'ok']);
    }

    // delete partner (cascade deletes DB rows; model callback removes files)
    public function destroy(Partner $partner)
    {
        // remove folder entirely to be safe
        $folder = "uploads/partners/{$partner->id}";
        if (File::exists($folder)) {
            File::deleteDirectory($folder);
        }
        $partner->delete();
        return redirect()->route('admin.partner')->with('success', 'Partner removed.');
    }


    public function deleteImage($id)
    {
        $image = PartnerImage::findOrFail($id);

        // delete file from storage/public path
        if (File::exists(public_path($image->file))) {
            File::delete(public_path($image->file));
        }

        $image->delete();

        return response()->json(['success' => true, 'id' => $id]);
    }

    public function updateImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $image = PartnerImage::findOrFail($id);

        // Delete old image
        if (File::exists(public_path($image->file))) {
            File::delete(public_path($image->file));
        }

        // Store new image
        $file = $request->file('image');
        $filename = 'partner_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/partners'), $filename);

        $image->update([
            'file' => 'uploads/partners/' . $filename
        ]);

        return response()->json([
            'success' => true,
            'new_path' => asset('uploads/partners/' . $filename)
        ]);
    }

}
