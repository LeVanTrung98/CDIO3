<?php
 session_start();

 function create_image()
 {

  $md5_hash = md5(rand(0,999));
  $security_code = substr($md5_hash, 15, 5) ;
  $_SESSION["security_code"] = $security_code;
  $width = 100;

  $height = 30;
  $image = ImageCreate($width, $height);

  $white = ImageColorAllocate($image, 250, 250, 200);
  $black = ImageColorAllocate($image, 0, 0, 10);

  ImageFill($image, 0, 0, $black);
  ImageString($image, 5, 30, 6, $security_code, $white);

  header("Content-Type: image/jpeg");
  ImageJpeg($image);

  ImageDestroy($image);
 }

 create_image() ;
 exit();

 ?>
