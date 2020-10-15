<?php
session_start();
   
    create_image();
    
    function create_image()
    {
        //unset($_SESSION['captcha']);
        //generate random code
        $md5_hash = md5(rand(0, 999));
        $captcha = substr($md5_hash, 15, 5);

        $_SESSION['captcha'] = $captcha;

        $width = 150;
        $height = 30;

        $image = ImageCreate($width, $height);

        //colours
        $white = imagecolorallocate($image, 255, 255, 255);
        $black = imagecolorallocate($image, 0, 0, 0);
        $orange = imagecolorallocate($image, 0, rand(0,255), 0);

        //making background
        imagefill($image, 0, 0, 0);

        //imagettftext($image, 25, 10, 45, 45, $white, $font, $captcha);
        imagestring($image, 10, 50, 7, $captcha, $orange);

        //informing browser for incoming png image file
        header("Content-Type: image/png");

        //convert image to PNG
        imagepng($image);

        //Clearing cache
        imagedestroy($image);
    }
?>