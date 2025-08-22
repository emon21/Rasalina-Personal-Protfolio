<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function logout(Request $request)
    {

        // session()->flush();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }


    //Profile

    public function profile(User $user)
    {
        $UserInfo = Auth::user();
        return view('admin.admin-profile', ['UserInfo' => $UserInfo]);
    }

    //EditProfile
    public function EditProfile(User $user)
    {
        $UserInfo = Auth::user();
        return view('admin.edit-profile', ['UserInfo' => $UserInfo]);
    }

    // UpdateProfile
    public function UpdateProfile(Request $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;

        $path = null;
        # Image Upload
        if ($request->hasFile('profileImage')) {

            // $image = $request->file('image');
            // $file = $image->move(public_path('uploads'), $image->getClientOriginalExtension());
            // 'profileImage'->$file

            //old image delete
            if ($user->profileImage) {
             unlink(public_path($user->profileImage));
            }
            
            //uploads image
            $file = $request->file('profileImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/profile'), $filename);
            // only file upload no foldername in database
            // $user->profileImage = $filename;
            //file upload in database path added hobe
            $path = 'uploads/profile/' . $filename;
            $user->profileImage = $path;
            // $user->save();
        }

        $user->save();

        //update 

        // User::where('id', $user->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'profileImage' => $path,
        // ]);


        return redirect()->route('admin.profile');
    }
}
