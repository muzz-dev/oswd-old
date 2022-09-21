<?php
session_start();
    header("Content-Type: image/png");
    $im = @imagecreate(110, 30)
        or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($im, 100,0,0);
    $text_color = imagecolorallocate($im, 255,255,0);
    $no = rand(11111,99999);
    $_SESSION["captcha"] = $no;
    imagestring($im, 5, 5, 5,  $no, $text_color);
    imagepng($im);
    imagedestroy($im);
?>