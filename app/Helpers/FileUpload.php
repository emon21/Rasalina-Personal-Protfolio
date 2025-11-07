<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUpload
{

   # Upload Image
   public static function uploadImage($file, $path)
   {
      // ফাইলের নাম unique করার জন্য time()
      $file_name = time() . '.' . $file->getClientOriginalExtension();

      // ফোল্ডার তৈরি হবে public/{path}/uploads
      $destinationPath = public_path($path . '/uploads');

      // যদি ফোল্ডার না থাকে, তাহলে তৈরি করে নেবে
      if (!file_exists($destinationPath)) {
         mkdir($destinationPath, 0777, true);
      }

      // ফাইল move করা হবে
      $file->move($destinationPath, $file_name);

      // শুধু ফাইল নাম return করবো
      return $file_name;
   }

   


//    🟢 শুধু ফাইল নাম DB তে সেভ হবে
// public static function uploadImage($file, $path)
// {
//     $file_name = time() . '.' . $file->getClientOriginalExtension();
//     $destinationPath = public_path($path . '/uploads');

//     if (!file_exists($destinationPath)) {
//         mkdir($destinationPath, 0777, true);
//     }

//     $file->move($destinationPath, $file_name);

//     // শুধু ফাইল নাম return করবো
//     return $file_name;
// }

// 🟢 Full Path DB তে সেভ হবে
// public static function uploadImage($file, $path)
// {
//     $file_name = time() . '.' . $file->getClientOriginalExtension();
//     $destinationPath = public_path($path . '/uploads');

//     if (!file_exists($destinationPath)) {
//         mkdir($destinationPath, 0777, true);
//     }

//     $file->move($destinationPath, $file_name);

//     // full relative path return করবো
//     return $path . '/uploads/' . $file_name;
// }

   # Delete Image
   public static function deleteImage($path)
   {
     
      if(!file_exists(public_path($path))){
         @unlink(public_path($path));
      }

      // ফাইল ডিলিট করা হবে
      // if(File::exists($path)){
      //    File::delete($path);
      // }
   }
}