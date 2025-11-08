<?php

namespace App\Http\Controllers\admin;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{

    public function index()
    {

        $services = Service::latest()->get();
        return view('admin.service.index', ['services' => $services]);
    }

    # Create Service
    public function create()
    {
        return view('admin.service.create');
    }

    # Store Service
    public function store(Request $request, Service $service)
    {

        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->long_description = $request->long_description;

        # Image upload
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service/', $filename);
            $service->picture = $filename;
        }

        $service->save();

        return redirect()->route('admin.service.index');
    }

    # Edit Service
    public function edit(Service $service)
    {
        return view('admin.service.edit', ['service' => $service]);
    }

    # Update Service
    public function update(Request $request, Service $service)
    {
        $service->title = $request->title;
        $service->short_description = $request->short_description;
        $service->long_description = $request->long_description;

        # Image upload
        if ($request->hasFile('picture')) {

            # Old Image Delete
            // if (file_exists('uploads/service/' . $service->picture)) {
            //     unlink('uploads/service/' . $service->picture);
            // }
            if (File::exists('uploads/service/' . $service->picture)) {
                File::delete('uploads/service/' . $service->picture);
            }

            # New Image Upload
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service/', $filename);
            $service->picture = $filename;
        }

        $service->save();

        return redirect()->route('admin.service.index');
    }

    # Delete Service
    public function destroy(Service $service)
    {

        # Old Image Delete
        // if (file_exists('uploads/service/' . $service->picture)) {
        //     unlink('uploads/service/' . $service->picture);
        // }

        if(File::exists('uploads/service/' . $service->picture)){
            File::delete('uploads/service/' . $service->picture);
        }

        $service->delete();

        return redirect()->route('admin.service.index');
    }


    # ServicesDetails

    public function ServicesDetails(Service $service)
    {
        return view('frontend.services-details',['service' => $service]);
    }

}
