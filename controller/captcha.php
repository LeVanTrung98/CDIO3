<?php 
	session_start();

	header('Content-Type: image/jpeg'); // hiển thị hình ảnh đã tạo

	$captcha = imagecreate(100, 50); //tạo ra một ảnh để chứa captcha

	imagecolorallocate($captcha, 42, 194, 42); // tạo màu cho khung nền captcha theo kiểu rgb;


	$content = substr(md5(time()*20-1998),0,5); // tạo ra giá trị captcha



	$font="c:/windows/fonts/arial.ttf";

	imagettftext($captcha, 18, 5, 20, 30,imagecolorallocate($captcha, 255,255,255), $font, $content);

	$_SESSION['code']=$content;

	imagejpeg($captcha); //tạo ra hình ảnh chúng ta muốn
	
	imagedestroy($captcha);
 ?>