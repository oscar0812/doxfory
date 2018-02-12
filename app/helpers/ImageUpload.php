<?php
namespace App\Helpers;

class ImageUpload
{
    public static function createDir($target_dir)
    {
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }
    }

    public static function uploadPfp($id, $home)
    {
        $dir ='img/';
        ImageUpload::createDir($dir);
        $dir .= 'uploads/';
        ImageUpload::createDir($dir);
        $dir .='pfp/';
        ImageUpload::createDir($dir);
        return ImageUpload::uploadToServer($dir, $id, $home, 'pfpUpload');
    }

    public static function uploadJobImage($id, $home){
      $dir ='img/';
      ImageUpload::createDir($dir);
      $dir .= 'uploads/';
      ImageUpload::createDir($dir);
      $dir .='job/';
      ImageUpload::createDir($dir);
      return ImageUpload::uploadToServer($dir, $id, $home, 'jobImageUpload');
    }

    protected static function uploadToServer($target_dir, $id, $home, $fileName)
    {
        $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$fileName]["tmp_name"]);
            if ($check == false) {
                return ['success'=>false, 'msg'=>'File is not an image'];
            }
        }

        // Check file size
        if ($_FILES[$fileName]["size"] > 500000) {
            return ['success'=>false, 'msg'=>'File is too large'];
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" &&
        $imageFileType != "jpeg" && $imageFileType != "gif") {
            return ['success'=>false, 'msg'=>'Only JPG, JPEG, PNG & GIF files are allowed'];
        }

        // change image name to ($user->id).jpg
        //$ext = substr($target_file, strripos($target_file, '.'));
        $url = $home.'img/uploads/pfp/'.$id.'.jpg';
        $target_file = $target_dir.$id.'.jpg';

        if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
            //echo "The file ". basename($_FILES[$fileName]["name"]). " has been uploaded.";
            return ['success'=>true, 'msg'=>'File uploaded', 'path'=>$url];
        } else {
            return ['success'=>false, 'msg'=>'There was an error uploading your file'];
        }
    }
}
