<?php 
	f
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require_once '../public/library/PHPMailer.php';
	require_once '../public/library/SMTP.php';
	require_once '../public/library/Exception.php';

	$mail = new PHPMailer();

	$mail->isSMTP();
	$mail->Host       = 'smtp.gmail.com';  
    $mail->SMTPAuth   = true;                               
    $mail->Username   = 'traning.tranghtt@gmail.com';                  
    $mail->Password   = 'abc12#$%^&';                              
    $mail->SMTPSecure = 'tls';                               
    $mail->Port       = 587;   


    $mail->setFrom('cdio397dtu@gmail.com', 'Mailer');
    $mail->addAddress('levantrung98.qn@gmail.com', 'hi trung');     // Add a recipient
    $mail->Subject = 'Send Mailer';
    $mail->Body    = 'Hello Le Van Trung<b>in bold!</b>';
    $mail->send();
    if(!$mail->Send()){
		echo "error: ". $mail->ErrorInfo;
	}else{
		echo "success";
	}

 ?>