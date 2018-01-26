<?php
namespace App\Helpers;

class ImageUpload
{
    private static $root_dir = 'uploads/';

    public static function createDir($target_dir)
    {
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }
    }

    public static function uploadPfp($id)
    {
        $dir = ImageUpload::$root_dir;
        ImageUpload::createDir($dir);
        $dir .='pfp/';
        ImageUpload::createDir($dir);
        return ImageUpload::upload($dir, $id);
    }
    
    public static function upload($dir, $id)
    {
        $target_dir = $dir;
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check == false) {
                return ['success'=>false, 'msg'=>'File is not an image'];
            }
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            return ['success'=>false, 'msg'=>'File is too large'];
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" &&
        $imageFileType != "jpeg" && $imageFileType != "gif") {
            return ['success'=>false, 'msg'=>'Only JPG, JPEG, PNG & GIF files are allowed'];
        }

        // change image name to ($user->id).extension
        $ext = substr($target_file, strripos($target_file, '.'));
        $target_file = $dir.$id.$ext;

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
            return ['success'=>true, 'msg'=>'File uploaded', 'path'=>$target_file];
        } else {
            return ['success'=>false, 'msg'=>'There was an error uploading your file'];
        }
    }
}
