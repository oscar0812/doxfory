<?php
namespace App\Helpers;

class ImageUpload
{
    private static function createDir($target_dir)
    {
        if (!file_exists($target_dir)) {
            mkdir($target_dir);
        }
    }

    private static function createDirs($target_dir)
    {
        $dir ='img/';
        ImageUpload::createDir($dir);
        $dir .= 'uploads/';
        ImageUpload::createDir($dir);
        $dir .=$target_dir;
        ImageUpload::createDir($dir);
        return $dir;
    }

    public static function uploadPfp($id, $home)
    {
        $target_dir = ImageUpload::createDirs('pfp/');
        $fileName = 'pfpUpload';
        $target_file = $target_dir . basename($_FILES[$fileName]["name"]);

        $errors = ImageUpload::checkForErrors($fileName, $target_dir);
        if (!$errors['success']) {
            return $errors;
        }

        // change image name to ($user->id).png
        //$ext = substr($target_file, strripos($target_file, '.'));
        $url = $home.'img/uploads/pfp/'.$id.'.png';
        $target_file = $target_dir.$id.'.png';

        if (move_uploaded_file($_FILES[$fileName]["tmp_name"], $target_file)) {
            //echo "The file ". basename($_FILES[$fileName]["name"]). " has been uploaded.";
            return ['success'=>true, 'msg'=>'File uploaded', 'path'=>$url];
        } else {
            return ['success'=>false, 'msg'=>'There was an error uploading your file'];
        }
    }

    public static function uploadJobImage($id, $home)
    {
        ImageUpload::createDirs('job/');

        if (isset($_SESSION['jobImageUpload'])) {
            try {
                $data = $_SESSION['jobImageUpload'];

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);

                $target_dir = 'img/uploads/job/';
                $url = $home.'img/uploads/job/'.$id.'.png';
                $target_file = $target_dir.$id.'.png';

                file_put_contents($target_file, $data);

                return ['success'=>true, 'has_file' => true, 'msg'=>'File uploaded', 'path'=>$url];
            } catch (\Exception $e) {
                return ['success'=>false, 'has_file' => false, 'msg'=>'There was an error uploading job image', 'path'=>''];
            }
        }

        return ['success'=>true, 'has_file' => false, 'path'=>''];
    }

    public static function checkForErrors($fileName, $target_dir)
    {
        $errors = ['success'=>true];
        $target_file = $target_dir . basename($_FILES[$fileName]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$fileName]["tmp_name"]);
            if ($check == false) {
                $errors = ['success'=>false, 'msg'=>'File is not an image'];
            }
        }
        // Check file size
        if ($_FILES[$fileName]["size"] > 500000) {
            $errors = ['success'=>false, 'msg'=>'File is too large'];
        }
        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" &&
            $imageFileType != "jpeg" && $imageFileType != "gif") {
            $errors = ['success'=>false, 'msg'=>'Only JPG, JPEG, PNG & GIF files are allowed'];
        }

        return $errors;
    }
}
