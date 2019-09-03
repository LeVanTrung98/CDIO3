<?php 
	namespace Controller;
				use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\Exception;
	class Validate{
		private $mess =array();
		private $name;

		public function __construct(){

		}

		public function getMess(){
			return $this->mess;
		}

		public function setName($value){
			$this->name=$value;
		}

		public function CheckNumber($value){
			if(isset($value)){
				if(empty($value)){
					$this->mess['err'][$this->name] = 'Không được để trống trường này!';
				}else{
					$check = preg_match("/^[0-9]*[0-9]$/", $value);
					if(!$check){
						$this->mess['err'][$this->name]= 'Giá trị cần nhập vào là số!';
					}else{
						$this->mess['success'][$this->name]= $value;
						// $this->mess['err']='';
					}
					
				}
			}else{
				$this->mess['err'][$this->name]= 'null';

			}
			
		}

		public function CheckText($value){
			if(isset($value)){
				if(empty($value)){
					$this->mess['err'][$this->name] = 'Không được để trống trường này!';
				}else{
					if(!is_string($value)){
						$this->mess['err'][$this->name] = 'Giá trị cần nhập là chuỗi kí tự';
					}else{
						$this->mess['success'][$this->name]= $value;
						// $this->mess['err']='';
						
					}
				}
			}else{
				$this->mess['err'][$this->name]= 'null';
			}
			
		}

		public function Security($value){
			$values = trim($value);
			$values = htmlspecialchars($values);
			return $values;
		}



		public function UploadImage(){
			$target_dir = "../public/image/";
			$target_file = $target_dir . basename($_FILES["hinh"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["hinh"]["tmp_name"]);
			    if($check !== false) {
			      
			        $uploadOk = 1;
			    } else {
			       $this->mess['err'][]= "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// if (file_exists($target_file)) {
			//   $this->mess['err'][]="file đã tồn tại.";
			//     $uploadOk = 0;
			// }
			if ($_FILES["hinh"]["size"] > 50000000) {
			  $this->mess['err'][]="file anh quá lớn.";
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			  $this->mess['err'][]= "đuôi ảnh phải là JPG, JPEG, PNG & GIF";
			    $uploadOk = 0;
			}
			if ($uploadOk == 0) {
			   $this->mess['err'][]= "file của bạn upload chưa thành công";
			} else {
			    if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
			       $this->mess['success'][]= $target_file. basename( $_FILES["hinh"]["name"]);
			    } else {
			        $this->mess['err'][]= "gặp vấn đề trong lúc upload ảnh";
			    }
			}
		}


		public function sendEmail($value,$value2){


			require_once '../public/library/PHPMailer.php';
			require_once '../public/library/POP3.php';
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

		    $mail->isHTML(true);   
		    $mail->setFrom('cdio397dtu@gmail.com', 'Mailer');
		    $mail->addAddress($value);     // Add a recipient
		    $mail->Subject = 'Check';
		    $mail->Body    = $value2;

		    $mail->send();
		    if(!$mail->Send()){
				echo "error: ". $mail->ErrorInfo;
			}else{
				echo "success";
			}

		}


	}

	// $a = new Validate();
	// $string = "12";
	// $b=$a->CheckNumber($string);
	// $c=$a->getMess();
	// var_dump($c);

 ?>