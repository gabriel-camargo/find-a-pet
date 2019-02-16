<?php

namespace FindAPet\Helper;

class ImageHelper
{
    public static function savePhoto($base64Image, $imageName, $folder)
    {
        $fileName =  $imageName.".png";

        $base64Image = trim($base64Image);
        $base64Image = str_replace('data:image/png;base64,', '', $base64Image);
        $base64Image = str_replace('data:image/jpg;base64,', '', $base64Image);
        $base64Image = str_replace('data:image/jpeg;base64,', '', $base64Image);
        $base64Image = str_replace('data:image/gif;base64,', '', $base64Image);
        $base64Image = str_replace(' ', '+', $base64Image);

        $imageData = base64_decode($base64Image);
        //Set image whole path here 
        $filePath = $_SERVER["DOCUMENT_ROOT"] . DIRECTORY_SEPARATOR . 
            "res" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR .
            $folder . DIRECTORY_SEPARATOR . $fileName;

        file_put_contents($filePath, $imageData);
    }

}