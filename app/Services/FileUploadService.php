<?php

namespace App\Services;

class FileUploadService{

   // /**
   //  * Upload a file to storage
   //  * 
   //  * @param  \Illuminate\Http\UploadedFile $file
   //  * @param  string $directory
   //  * @return string $filePath
   //  */
   // public function upload(UploadedFile $file, string $directory = 'uploads')
   // {
   //    // Save file to storage/app/public/{directory}
   //    $path = $file->store($directory, 'public');
   //    return $path; // Example: uploads/abc123.jpg
   // }

   # Upload Image
   public function uploadFile($file,$path){
      $file->move(public_path($path), $file->getClientOriginalName());
      return $file->getClientOriginalName();
   }


   //  public function UploadImage(UploadedFile $file, string $folder = 'uploads')
   // {
   //    // Generate a unique file name
   //    // $fileName = date("d_M_Y") . '_' . rand(0,100) . '.' . $file->getClientOriginalExtension(); 

   //    $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

   //    // Move the uploaded file to the desired directory

   //    // $file->move(public_path('images'), $fileName);

   //    $file->move(public_path($folder), $fileName);

   //    // Return the stored file path
   //    return  $folder . "/" . $fileName;
   // }

   # delete Image

   public function deleteFile($path){
      unlink(public_path($path));
   }


   // /**
   //  * Delete a file from storage
   //  * 
   //  * @param  string|null $filePath
   //  * @return bool
   //  */
   // public function delete(?string $filePath)
   // {
   //    if ($filePath && Storage::disk('public')->exists($filePath)) {
   //       return Storage::disk('public')->delete($filePath);
   //    }
   //    return false;
   // }

   // public static function deleteImage($imagePath)
   // {
   //    if (File::exists(public_path($imagePath))) {
   //       File::delete(public_path($imagePath));
   //       return true;
   //    }
   //    return false;

   //    //  if (File::exists($imagePath)) {
   //    //     File::delete($imagePath);
   //    // }
   // }



}