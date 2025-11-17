<?php

namespace App\Http\Controllers;

use ToastrHelper;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function logout(Request $request)
    {

        // session()->flush();

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        # Toaster Helper Function Using
        flashToastr('success', 'User Has been Logout Successfully Done');
        return redirect('/login');
    }


    # Dashboard
    public function Dashboard(){
        return view('admin.index');
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
            //file upload in database path added hoby
            $path = 'uploads/profile/' . $filename;
            $user->profileImage = $path;
        }

        $user->save();

        //update 

        // User::where('id', $user->id)->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'profileImage' => $path,
        // ]);


        # Toaster Helper Function Using
        flashToastr('success', 'Profile Has been Successfully Updated', 'Profile Updated');
        return redirect()->route('admin.profile');
    }

    # ChangePassword

    public function ChangePassword()
    {
        return view('admin.auth.change-password');
    }

    # UpdatePassword

    public function UpdatePassword(Request $request)
    {
        $validate = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        ]);

        // $user = Auth::user();

        $HashPassword = Auth::user()->password;

        // Check password,Request Password
        if (Hash::check($request->old_password, $HashPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->new_password);
            $user->save();

            // session()->flash('message','Password Updated Successfully');
            flashToastr('success', 'Password Updated Successfully', 'Password Updated');
            return redirect()->route('admin.change.password');

            // return redirect()->back();
            //return redirect login page
            // return redirect('login)->back();


        } else {
            // session()->flash('message', 'Old Password is not Match');
            flashToastr('error', 'Old Password is not Match', 'Password Error');

            // return redirect()->back();
            return redirect()->route('admin.change.password');
        }


        #old Password

        # New Password

        # COnfirm Password


        # Toaster Helper Function Using
        flashToastr('success', 'Profile Has been Successfully Updated', 'Profile Updated');
        return redirect()->route('admin.profile');
    }
}
