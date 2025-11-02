<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Concerns\HasUniqueIds;

class ImageService
{

   /*
   * Upload an image to a given path
   */
   //  *
   //  * @param  string  $path
   //  * @param  \Illuminate\Http\UploadedFile  $file
   //  * @param  string|null  $disk
   //  * @return string
   //  */
   // public function upload($path, $file, $disk = null)
   // {
   //     return Storage::disk($disk)->put($path, $file);
   // }

   # upload Image
   /**
    * Upload an image to a given path
    *
    * @param UploadedFile $file
    * @param string $folder
    * @return string $fileName
    */

 

   public static function UploadImage(UploadedFile $file, string $folder = 'uploads')
   {
      // Generate a unique file name
      // $fileName = date("d_M_Y") . '_' . rand(0,100) . '.' . $file->getClientOriginalExtension(); 

      $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

      // Move the uploaded file to the desired directory

      $path = $file->move(public_path($folder), $fileName);

      // return $path;

      // Return the stored file path
      return  $folder . "/" . $fileName;
   }


   # Delete Image

   /**
    * Delete an image from public/ path/foldername
    *
    * @param string $filePath
    * @return bool
    */


   /**
    * Delete an existing image file.
    */
   public static function deleteImage($imagePath)
   {
      if (File::exists(public_path($imagePath))) {
         File::delete(public_path($imagePath));
         return true;
      }
      return false;

      //  if (File::exists($imagePath)) {
      //     File::delete($imagePath);
      // }
   }

   // public function DeleteImage(string $filePath)
   // {

   //    // if (file_exists(public_path($filePath))) {
   //    //    unlink(public_path($filePath));
   //    //    return true;
   //    // }

   //     if(File::exists(public_path($filePath))) {
   //       unlink(public_path($filePath));
   //       return true;
   //    }
   // return false; 



   //    // if (file_exists(public_path($filePath))) {
   //    //    unlink(public_path($filePath));
   //    //    return true;
   //    // }
   //    // return false;


   //    // ফাইলের অস্তিত্ব এবং পারমিশন চেক

   //    // $fullPath = public_path($filePath);
   //    //   if (File::exists($fullPath)) {
   //    //       File::delete($fullPath);
   //    //       return true;
   //    //   }

   //    //   return false;

   // }

}
