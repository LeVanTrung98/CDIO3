<?php 
	session_start();
	use Model\LoiViPham;
	use Model\Tainan;
	use Model\Taikhoan;
	use Model\Login;
	use Model\infoUser;
	use Model\infoAdmin;
	use Model\Moto;
	use Model\Traodoi;
	use Model\Bienban;
	use Controller\Validate;
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require_once 'Validate.php';
	require_once '../model/User.php';


	$Mess =array();

	if(isset($_POST['action'])){
		 $action = $_POST['action'];
	}
	if(isset($_GET['action'])){
		$action = $_GET['action'];
	}

	$action = isset($action) ? $action : 'trangchulogin';
				// echo "<pre>";
				// print_r($action);
				// echo "</pre>";
	switch ($action) {
		case 'trangchulogin':
			require_once '../view/trangchudangnhap.php';
			break;
		case 'trangchu':
			require_once '../view/trangchu_root.php';
			break;

		case 'trangchuUser':
			require_once '../view/trangchu_user.php';
			exit();
			break;

		case 'trangchuAdmin':
			require_once '../view/trangchu_admin.php';
			exit();
			break;

		case 'tainan':
			require_once'../view/quanlytainan.php';
			break;

		case 'taikhoan':
			require_once '../view/quanlytaikhoan.php';
			break;

		case 'quydinhgiaothong':
			require_once '../view/quydinhgiaothong.php';
			break;

		case 'dangkyxe':
			require_once '../view/dangkyxe.php';
			exit();
			break;


		case 'viewluatAdmin':
				$show = new LoiViPham();
				$showall = $show->ShowAll();
				$showall =$show->getMess();
				if($showall){
					$showall=$showall;
				}else{
					echo null;
				}
				require_once '../view/viewluatAdmin.php';
				exit();
				break;	

		case 'ttcnUser':
			require_once '../view/viewTTCN_user.php';
			exit();
			break;

		case 'ttxeUser':
			$tendangnhap = $_SESSION['user']['tendangnhap'];
			$moto= new Moto();
			$check=$moto->Check($tendangnhap);
			$check=$moto->getMess();
			if($check){
				$xe=$check;
			}else{
				$errmatainan="Không có thông tin xe của tài khoản này!";
			}
			require_once '../view/viewTTXE_user.php';
			exit();
			break;

		case 'quanlyxe':
			require_once '../view/quanlyxe.php';
			exit();
			break;

		case 'TTCNUser':
			if (isset($_POST['submit'])) {
				$tendangnhap=$_SESSION['user']['tendangnhap'];
				$show = new infoUser();
				$check = $show->Check($tendangnhap);
				$check=$show->getMess();
				$tenchuxe=$check['tenchuxe'];
				$diachi = $check['diachi'];
				$sdt = $check['sodienthoai'];
				$gioitinh = $check['gioitinh'];
				$ngaysinh = $check['ngaysinh'];
				$quoctich = $check['quoctich'];
			}
			require_once '../view/viewTTCN_user.php';
			exit();
			break;

		case 'ttcnAdmin':
			require_once '../view/viewTTCN_Admin.php';
			exit();
			break;
		case 'TTCNAdmin':
			if (isset($_POST['submit'])) {
				$tendangnhap=$_SESSION['user']['tendangnhap'];
				$show = new infoAdmin();
				$check = $show->Check($tendangnhap);
				$check=$show->getMess();
				$maca=$check['macongan'];
				$tencongan = $check['tencongan'];
				$sdt = $check['sodienthoai'];
				$diachi = $check['diachi'];
				$tocongtac = $check['tocongtac'];
			}
			require_once '../view/viewTTCN_Admin.php';
			exit();
			break;

		case 'insert_loi':
			if(isset($_POST['submit'])){
				$vali = new Validate();
				$vali->setName('malvp');
				$mavipham = $vali->CheckText($_POST['maLVP']);
				//$mavipham=$vali->getMess();
				$vali->setName('tenvp');
				$tenVP = $vali->CheckText($_POST['tenVP']);
				//$tenVP = $vali->getMess();
				$vali->setName('mucp');
				$mucP = $vali->CheckText($_POST['mucP']);
				//$mucP = $vali->getMess();
				$vali->setName('hinht');
				$hinhT = $vali->CheckText($_POST['hinhT']);
				//$hinhT = $vali->getMess();
				$Mess = $vali->getMess();

				if(isset($Mess['err'])){
					$errmaLVP = $vali->Security($Mess['err']['malvp']);
					$errtenVP = $vali->Security($Mess['err']['tenvp']);
					$errmucp = $vali->Security($Mess['err']['mucp']);
					$errhinhT = $vali->Security($Mess['err']['hinht']);
				}else{
					$maLVP = $vali->Security($Mess['success']['malvp']);
					$tenVP = $vali->Security($Mess['success']['tenvp']);
					$mucp = $vali->Security($Mess['success']['mucp']);
					$hinhT = $vali->Security($Mess['success']['hinht']);
					$user = new LoiViPham();
					$check = $user->Check($maLVP);
					$check = $user->getMess();
					print_r($check);
					if(!$check){
						$insert = $user->Insert($maLVP,$tenVP,$mucp,$hinhT);
						if(!$insert){
							$errmaLVP= 'thêm thành công';
						}else{
							$errmaLVP ="thêm thất bại";
						}
					}else{
						$errmaLVP = 'Trùng mã loại vi phạm';
					}
				}
				
			}
			if(isset($_POST['update'])){
				$vali = new Validate();
				$vali->setName('malvp');
				$mavipham = $vali->CheckText($_POST['maLVP']);
				// $mavipham=$vali->getMess();
				$vali->setName('tenvp');
				$tenVP = $vali->CheckText($_POST['tenVP']);
				// $tenVP = $vali->getMess();
				$vali->setName('mucp');
				$mucP = $vali->CheckText($_POST['mucP']);
				// $mucP = $vali->getMess();
				$vali->setName('hinht');
				$hinhT = $vali->CheckText($_POST['hinhT']);
				// $hinhT = $vali->getMess();
				$Mess = $vali->getMess();

				if(isset($Mess['err'])){
					$errmaLVP = $vali->Security($Mess['err']['malvp']);
					$errtenVP = $vali->Security($Mess['err']['tenvp']);
					$errmucp = $vali->Security($Mess['err']['mucp']);
					$errhinhT = $vali->Security($Mess['err']['hinht']);

				}else{
					$maLVP = $vali->Security($Mess['success']['malvp']);
					$tenVP = $vali->Security($Mess['success']['tenvp']);
					$mucp = $vali->Security($Mess['success']['mucp']);
					$hinhT = $vali->Security($Mess['success']['hinht']);
					$user = new LoiViPham();
					$check = $user->Check($maLVP);
					if($check){
						$update = $user->Update($maLVP,$tenVP,$mucp,$hinhT);
						if(!$update){
							$errmaLVP= 'update thành công';
						}else{
							$errmaLVP ="update thất bại";
						}
					}else{
						$errmaLVP = ' mã loại vi phạm không có';
					}
				}
			}
			if(isset($_POST['delete'])){
				$vali = new Validate();
				$vali->setName('malvp');
				$mavipham = $vali->CheckText($_POST['maLVP']);
				$Mess=$vali->getMess();
				// echo "<pre>";
				// print_r($Mess);
				// echo "</pre>";
				if(isset($Mess['err']['malvp'])){
					$errmaLVP = $vali->Security($Mess['err']['malvp']);
				}else{
					$id = $Mess['success']['malvp'];
					$dele = new LoiViPham();
					if(!empty($id)){
						$check = $dele->Check($id);
						if($check){
							try {
								$xoa = $dele->Delete($id);
								$errmaLVP= "Xóa thành công";
							} catch (Exception $e) {
								$errmaLVP = $e->getMessage();
							}
						}else{
							$errmaLVP = 'Mã vi phạm không tồn tại';
						}
					}else{
						$errmaLVP="cần nhập mã vi phạm để xóa";
					}
				
				}

			}
			require_once '../view/quydinhgiaothong.php';

			break;

		case 'quanlytainan':
			if(isset($_POST['submit'])){
				$vali = new Validate();
				$vali->setName('matainan');
				$matainan = $vali->CheckText($_POST['matainan']);
				$vali->setName('macongan');
				$macongan = $vali->CheckText($_POST['macongan']);
				$vali->setName('diadiem');
				$diadiem = $vali->CheckText($_POST['diadiem']);
				$vali->setName('thongtin');
				$thongtin =$vali->CheckText($_POST['thongtin']);
				$image = $vali->UploadImage();
				$Mess= $vali->getMess();
				if(!empty($Mess['err']['matainan']) && !empty($Mess['err']['macongan']) && !empty($Mess['err']['diadiem'])&& !empty($Mess['err']['thongtin']) ){
					$errmatainan=isset($Mess['err']['matainan'])?$Mess['err']['matainan']:null;
					$errmacongan = isset($Mess['err']['macongan'])?$Mess['err']['macongan']:null;
					$errdiadiem = isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
					$errthongtin = isset($Mess['err']['thongtin'])?$Mess['err']['thongtin']:null;
					// $errimage = $Mess['err']['image'];
				}else{
					$matainan = $vali->Security(isset($Mess['success']['matainan'])?$Mess['success']['matainan']:null);
					$macongan = $vali->Security(isset($Mess['success']['macongan'])?$Mess['success']['macongan']:null);
					$diadiem =$vali->Security(isset($Mess['success']['diadiem'])?$Mess['success']['diadiem']:null);
					$thongtin =$vali->Security(isset($Mess['success']['thongtin'])?$Mess['success']['thongtin']:null);
					$image = $vali->Security(isset($Mess['success']['0'])?$Mess['success']['0']:null);
					$data = new Tainan();
					$check = $data->Check($matainan);
					$check1 = $data->getID();
					if(empty($check1['matainan'])){
						try {
							$them = $data->Insert($macongan,$diadiem,$thongtin,$image,$matainan);
							$errmatainan= "thêm thành công";
						} catch (Exception $e) {
							$errmatainan = $e->getMessage();
						}
					}else{
						$errmatainan = 'Không được trùng mã tai nạn';
					}
					
					
					
				}
			}
			// end thêm
			if(isset($_POST['update'])){
				$vali = new Validate();
				$vali->setName('matainan');
				$matainan = $vali->CheckText($_POST['matainan']);
				$vali->setName('macongan');
				$macongan = $vali->CheckText($_POST['macongan']);
				$vali->setName('diadiem');
				$diadiem = $vali->CheckText($_POST['diadiem']);
				$vali->setName('thongtin');
				$thongtin =$vali->CheckText($_POST['thongtin']);
				$image = $vali->UploadImage();
				$Mess = $vali->getMess();
				// echo "<pre>";
				// print_r($Mess);
				// echo "</pre>";
				if(!empty($Mess['err']['matainan']) && !empty($Mess['err']['macongan']) && !empty($Mess['err']['diadiem'])&& !empty($Mess['err']['thongtin']) ){
					$errmatainan=isset($Mess['err']['matainan'])?$Mess['err']['matainan']:null;
					$errmacongan = isset($Mess['err']['macongan'])?$Mess['err']['macongan']:null;
					$errdiadiem = isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
					$errthongtin = isset($Mess['err']['thongtin'])?$Mess['err']['thongtin']:null;
				}else{
					$matainan = $vali->Security(isset($Mess['success']['matainan'])?$Mess['success']['matainan']:null);
					$macongan = $vali->Security(isset($Mess['success']['macongan'])?$Mess['success']['macongan']:null);
					$diadiem =$vali->Security(isset($Mess['success']['diadiem'])?$Mess['success']['diadiem']:null);
					$thongtin =$vali->Security(isset($Mess['success']['thongtin'])?$Mess['success']['thongtin']:null);
					$image = $vali->Security(isset($Mess['success'][0])?$Mess['success'][0]:null);
					$data = new Tainan();
					$check = $data->Check($matainan);
					$check1 = $data->getID();
					if($check1){
						try {
							$up = $data->Update($matainan,$macongan,$diadiem,$thongtin,$image);
							$errmatainan= "Cập nhật thành công";
						} catch (Exception $e) {
							$errmatainan= "Cập nhật thất bại";
						}
					}else{
						$errmatainan = 'Mã tai nạn không chính xác';
					}				
				}
			}
			// end update
			if(isset($_POST['delete'])){
				$vali = new Validate();
				$vali->setName('matainan');
				$matainan = $vali->CheckText($_POST['matainan']);
				$Mess= $vali->getMess();
				if(isset($Mess['err'])){
					$errmatainan=isset($Mess['err']['matainan'])?$Mess['err']['matainan']:null;
				}else{
					$matainan = $vali->Security(isset($Mess['success']['matainan'])?$Mess['success']['matainan']:null);
					$data = new Tainan();
					$check = $data->Check($matainan);
					$check1 = $data->getID();
					if($check1){
						$de = $data->Delete($matainan);
						$errmatainan = 'Xóa thành công';
					}else{
						$errmatainan = 'Không tồn tại mã tai nạn';
					}
				}
			}
			require_once '../view/quanlytainan.php';
			break;


		case 'quanlytaikhoan':
			if(isset($_POST['submit'])){
				$vali = new Validate();
				$vali->setName('tendangnhap');
				$tendangnhap = $vali->CheckNumber($_POST['tendangnhap']);
				$vali->setName('pass');
				$pass = $vali->CheckText($_POST['pass']);
				$vali->setName('quyen');
				$quyen = $vali->CheckText(isset($_POST['quyen'])?$_POST['quyen']:null);
				$Mess = $vali->getMess();
				
				if(isset($Mess['err'])){
					$errtendangnhap=isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
					$errpass=isset($Mess['err']['pass'])?$Mess['err']['pass']:null;
					$errquyen=isset($Mess['err']['quyen'])?$Mess['err']['quyen']:null;
				}else{
					$tendangnhap = $vali->Security(isset($Mess['success']['tendangnhap'])?$Mess['success']['tendangnhap']:null);
					$pass = $vali->Security(isset($Mess['success']['pass'])?$Mess['success']['pass']:null);
					
					$quyen =$vali->Security(isset($Mess['success']['quyen'])?$Mess['success']['quyen']:null);
					$data = new Taikhoan();
					$check1 = $data->Check($tendangnhap);
					$check = $data->getMess();
					if(!empty($tendangnhap) && !empty($quyen) && !empty($pass)){
						if(!$check){
							try {
								$pass2 = md5($pass);
								$them = $data->Insert($tendangnhap,$pass2,$quyen);
								 $errtendangnhap= "thêm thành công";
							} catch (Exception $e) {
								$err = $e->getMessage();
							}
						}else{
							 $errtendangnhap = 'Không được trùng tên đăng nhập';
						}
					}else{
						 $errtendangnhap = 'Cần nhập đầy đủ';
					}
				}
			}
			// end add
			if(isset($_POST['update'])){
				$vali = new Validate();
				$vali->setName('tendangnhap');
				$tendangnhap = $vali->CheckNumber($_POST['tendangnhap']);
				$vali->setName('pass');
				$pass = $vali->CheckText($_POST['pass']);
				$vali->setName('quyen');
				$quyen = $vali->CheckText($_POST['quyen']);
				$Mess= $vali->getMess();
				if(isset($Mess['err'])){
					$errtendangnhap=isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
					$errpass=isset($Mess['err']['pass'])?$Mess['err']['pass']:null;
					$errquyen=isset($Mess['err']['quyen'])?$Mess['err']['quyen']:null;
				}else{
					$tendangnhap = $vali->Security(isset($Mess['success']['tendangnhap'])?$Mess['success']['tendangnhap']:null);
					$pass = $vali->Security(isset($Mess['success']['pass'])?$Mess['success']['pass']:null);
					$pass2 = md5($pass);
					$quyen = $vali->Security(isset($Mess['success']['quyen'])?$Mess['success']['quyen']:null);
					
					$data = new Taikhoan();
					$check1 = $data->Check($tendangnhap);
					$check = $data->getMess();
					if(!empty($tendangnhap) && !empty($quyen) && !empty($pass2)){
						if($check){
							try {
								$them = $data->Update($tendangnhap,$pass2,$quyen);
								$errtendangnhap= "Cập nhật thành công";
							} catch (Exception $e) {
								$err = $e->getMessage();
							}
						}else{
							$errtendangnhap = 'Tên đăng nhập không tồn tại';
						}
					}else{
					 $errtendangnhap = 'Cần nhập đầy đủ';
				}
					
					
					
					
				}
			}
			// end update
			if(isset($_POST['delete'])){
				$vali = new Validate();
				$vali->setName('tendangnhap');
				$tendangnhap = $vali->CheckNumber($_POST['tendangnhap']);
				$Mess= $vali->getMess();
				if(isset($Mess['err'])){
					$errtendangnhap=isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
				}else{
					$tendangnhap = $vali->Security(isset($Mess['success']['tendangnhap'])?$Mess['success']['tendangnhap']:null);
					$data = new Taikhoan();
					$check1 = $data->Check($tendangnhap);
					$check = $data->getMess();
					if(!empty($tendangnhap)){
						if($check){
							try {
								$them = $data->Delete($tendangnhap);
								$errtendangnhap= "Xóa thành công";
							} catch (Exception $e) {
								$err = $e->getMessage();
							}
						}else{
							$errtendangnhap = 'Tên đăng nhập không tồn tại';
						}
					}else{
						$errtendangnhap="cần nhập Tên đăng nhập để xóa";
					}
					
				}
			}

			// end delete
			require_once '../view/quanlytaikhoan.php';
			break;
		
		case 'login':
			if(isset($_POST['btn-submit'])){
				$vali = new Validate();
				$vali->setName('tendangnhap');
				$tendangnhap = $vali->CheckNumber($_POST['tendangnhap']);
				$vali->setName('pass');
				$pass = $vali->CheckText($_POST['pass']);
				$vali->setName('captcha');
				$captcha = $vali->CheckText($_POST['captcha']);
				$Mess = $vali->getMess();
				if(isset($Mess['err'])){
					$errT = isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
					$errP = isset($Mess['err']['pass'])?$Mess['err']['pass']:null;
					$errC = isset($Mess['err']['captcha'])?$Mess['err']['captcha']:null;
				}else{
					$tendangnhap = $Mess['success']['tendangnhap'];
					$pass=md5($Mess['success']['pass']);

					$code = $Mess['success']['captcha'];
					$sscapcha = isset($_SESSION['code']) ? $_SESSION['code'] : "";
					if($sscapcha == $code){
						$login = new Login();
						$check = $login->Check($tendangnhap,$pass);
						$info = $login->getMess();
						if(!empty($info['tendangnhap']) && !empty($info['matkhau'])){
							$_SESSION['user']=$info['quyen'];
							$quyen = $_SESSION['user']['quyen'];
							if($quyen == '1'){
								header('Location: ../view/trangchu_user.php');
							}else if($quyen=='2'){
								header('Location: ../view/trangchu_admin.php');
							}else{
								header('Location: ../view/trangchu_root.php');
							}
						}else{
							$errT = 'Sai tài khoản hoặc mật khẩu';
						}
					}else
					{
						$errC= "không hợp lệ mã captcha";
					}
					unset($_SESSION['code']);
				}
			}
			include_once '../view/trangchudangnhap.php';
			exit();
			break;


		case 'dangxuat':
			session_destroy();
			header('Location: ../view/trangchudangnhap.php');
			break;


		case 'quentaikhoan':
			require_once '../view/quenmatkhau.php';
			break;

		case 'quenmatkhau':
			if(isset($_POST['submit'])){
				$vali = new Validate();
				$vali->setName('email');
				$email=$vali->CheckText($_POST['email']);
				$Mess= $vali->getMess();
				if(!empty($Mess['err'])){
					$errE = $Mess['err']['email'];
				}else{
					$email = $Mess['success']['email'];
					$random='<a href="http://localhost/learnphp/cdio397/controller/xuli.php?action=fogot">Click here</a>';
					$send=$vali->sendEmail($email,$random);
					$errE ="Vào email của bạn để tiếp tục xác thực";
				}
			}
			require_once '../view/quenmatkhau.php';
			break;

		case 'fogot':
			require_once'../view/fogotPass.php';
			exit();
			break;

		case 'fogetPass':
			if(isset($_POST['submit'])){
				$vali = new Validate();
				$vali->setName('pass');
				$pass=$vali->CheckText($_POST['pass']);
				$vali->setName('repass');
				$repass=$vali->CheckText($_POST['repass']);
				$vali->setName('taikhoan');
				$repass=$vali->CheckText($_POST['taikhoan']);
				$Mess= $vali->getMess();
				if(!empty($Mess['err'])){
					$errP = isset($Mess['err']['pass'])?$Mess['err']['pass']:null;
					$errR= isset($Mess['err']['repass'])?$Mess['err']['repass']:null;
					$errT=
					isset($Mess['err']['taikhoan'])?$Mess['err']['taikhoan']:null;
				}else{
					$pass = $Mess['success']['pass'];
					$repass = $Mess['success']['repass'];
					$tendangnhap=$Mess['success']['taikhoan'];
					$login = new Login();
					$check = $login->Check1($tendangnhap);
					$check=$login->getMess();
					if($check){
						if(strcmp($pass, $repass)==0){
							$pass2 =md5($pass);
							$up = $login->Update($pass2,$tendangnhap);
							if($pass){
								$errT="Thay đổi thành công!";
								header('Location: ../view/trangchudangnhap.php');
							}else{
								$errT="Thay đổi thất bại!";
							}
						}else{
							$errR="Re-PassWord không giống PassWord";
						}
					}else{
						$errT ="Tên đăng nhập không tồn tại";
					}
					
				}
			}
			require_once '../view/fogotPass.php';
			break;

		case 'thongtincanhan1':
			require_once'../view/quanlithongtincanhan.php';
			exit();
			break;

		case 'thongtincanhan':
			if(isset($_POST['submit'])){
				$vali = new Validate();
				$vali->setName('tendangnhap');
				$tendangnhap = $vali->CheckNumber($_POST['tendangnhap']);
				$Mess = $vali->getMess();
				if(!empty($Mess['err'])){
					$errT = $Mess['err']['tendangnhap'];
				}else{
					$tendangnhap = $Mess['success']['tendangnhap'];
					$check = new Login();
					$kt=$check->Check1($tendangnhap);
					$kt= $check->getMess();
					if($kt){
						$taikhoan = new Taikhoan();
						$check = $taikhoan->Check($tendangnhap);
						$info = $taikhoan->getMess();
						$_SESSION['tendangnhap']=$tendangnhap;
						$quyen = $info['quyen'];
						if($quyen==1){
							header("Location: ../view/infoUsers.php");
						}else{
							header('Location: ../view/infoAdmin.php');
						}
					}else{
						$errT="không tồn tại tên đăng nhập này";
					}
					
				}
			}
			require_once '../view/quanlithongtincanhan.php';
			break;

			case 'infoUsers':
				if(isset($_POST['submit'])){
					$vali = new Validate();
					$vali->setName('tenchuxe');
					$tenchuxe= $vali->CheckText($_POST['tenchuxe']);
					$vali->setName('diadiem');
					$diadiem = $vali->CheckText($_POST['diachi']);
					$vali->setName('sdt');
					$sdt = $vali->CheckNumber($_POST['sodienthoai']);
					$vali->setName('sex');
					$sex = $vali->CheckText(isset($_POST['gioitinh'])?$_POST['gioitinh']:null);
					$vali->setName('ngaysinh');
					$ngaysinh = $vali->CheckText($_POST['ngaysinh']);
					$vali->setName('quoctich');
					$quoctich= $vali->CheckText($_POST['quoctich']);

					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errTCX= isset($Mess['err']['tenchuxe'])?$Mess['err']['tenchuxe']:null;
						$errD = isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
						$errS = isset($Mess['err']['sdt'])?$Mess['err']['sdt']:null;
						$errG = isset($Mess['err']['sex'])?$Mess['err']['sex']:null;
						$errN = isset($Mess['err']['ngaysinh'])?$Mess['err']['ngaysinh']:null;
						$errQ= isset($Mess['err']['quoctich'])?$Mess['err']['quoctich']:null;
					}else{
						$tendangnhap = $_SESSION['tendangnhap'];
						$tenchuxe = $Mess['success']['tenchuxe'];
						$diadiem= $Mess['success']['diadiem'];
						$sdt = $Mess['success']['sdt'];
						$gioitinh = $Mess['success']['sex'];
						$ngaysinh = $Mess['success']['ngaysinh'];
						$quoctich = $Mess['success']['quoctich'];
						try {
							$in=new infoUser();
							$them=$in->Insert($tendangnhap,$tenchuxe,$diadiem,$sdt,$gioitinh,$ngaysinh,$quoctich);
							if ($them) {
								$errTCX = "Thêm mới thành công";
							}else{
								$errTCX = "Thêm mới thất bại";
							}
						} catch (Exception $e) {
							$errTCX = $e->getMessage();
						}
						

					}


				}

				if(isset($_POST['update'])){
					$vali = new Validate();
					$vali->setName('tenchuxe');
					$tenchuxe= $vali->CheckText($_POST['tenchuxe']);
					$vali->setName('diadiem');
					$diadiem = $vali->CheckText($_POST['diachi']);
					$vali->setName('sdt');
					$sdt = $vali->CheckNumber($_POST['sodienthoai']);
					$vali->setName('sex');
					$sex = $vali->CheckText(isset($_POST['gioitinh'])?$_POST['gioitinh']:null);
					$vali->setName('ngaysinh');
					$ngaysinh = $vali->CheckText($_POST['ngaysinh']);
					$vali->setName('quoctich');
					$quoctich= $vali->CheckText($_POST['quoctich']);

					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errTCX= isset($Mess['err']['tenchuxe'])?$Mess['err']['tenchuxe']:null;
						$err= isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
						$errS= isset($Mess['err']['sdt'])?$Mess['err']['sdt']:null;
						$errG= isset($Mess['err']['sex'])?$Mess['err']['sex']:null;
						$errN= isset($Mess['err']['ngaysinh'])?$Mess['err']['ngaysinh']:null;
						$err= isset($Mess['err']['quoctich'])?$Mess['err']['quoctich']:null;
					}else{
						$tendangnhap = $_SESSION['tendangnhap'];
						$tenchuxe = $Mess['success']['tenchuxe'];
						$diadiem= $Mess['success']['diadiem'];
						$sdt = $Mess['success']['sdt'];
						$gioitinh = $Mess['success']['sex'];
						$ngaysinh = $Mess['success']['ngaysinh'];
						$quoctich = $Mess['success']['quoctich'];
						$up = new infoUser();
						$check = $up->Check($tendangnhap);
						$check=$up->getMess();

						if($check){
							try {
								$in=new infoUser();
								$them=$in->Update($tendangnhap,$tenchuxe,$diadiem,$sdt,$gioitinh,$ngaysinh,$quoctich);
								if ($them) {
									$errTCX = "Cập nhật thành công";
								}else{
									$errTCX = "Cập nhật thất bại";
								}
							} catch (Exception $e) {
								$errTCX = $e->getMessage();
							}
						}else{
							$errTCX="Tên đăng nhập không tồn tại";
						}

						
						

					}
				}

				if (isset($_POST['delete'])) {
					$tendangnhap = $_SESSION['tendangnhap'];
					try {
						$de = new infoUser();
						$check = $de->Check($tendangnhap);
						$xoa = $de->getMess();
						if($xoa){	
							$de->Delete($tendangnhap);
							$errTCX="Xóa thành công";
						}else{
							$errTCX="Xóa thất bại";
						}
					} catch (Exception $e) {
						$errTCX = $e->getMessage();
					}
				}
				require_once '../view/infoUsers.php';
				exit();
				break;


			case 'infoAdmin':
				if(isset($_POST['submit'])){
					$vali = new Validate();
					$vali->setName('macongan');
					$macongan= $vali->CheckText($_POST['macongan']);
					$vali->setName('tencongan');
					$tencongan = $vali->CheckText($_POST['tencongan']);
					$vali->setName('tocongtac');
					$tocongtac = $vali->CheckText($_POST['tocongtac']);
					$vali->setName('diadiem');
					$diadiem = $vali->CheckText($_POST['diadiem']);
					$vali->setName('sodienthoai');
					$sodienthoai = $vali->CheckNumber($_POST['sodienthoai']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errM = isset($Mess['err']['macongan'])?$Mess['err']['macongan']:null;
						$errD= isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
						$errT= isset($Mess['err']['tencongan'])?$Mess['err']['tencongan']:null;
						$errTCT=isset($Mess['err']['tocongtac'])?$Mess['err']['tocongtac']:null;
						$errN= isset($Mess['err']['sodienthoai'])?$Mess['err']['sodienthoai']:null;
					}else{
						$macongan = $Mess['success']['macongan'];
						$tencongan= $Mess['success']['tencongan'];
						$sodienthoai = $Mess['success']['sodienthoai'];
						$tocongtac = $Mess['success']['tocongtac'];
						$diadiem = $Mess['success']['diadiem'];
						try {
							$in=new infoAdmin();
							$check= $in->Check($macongan);
							$check=$in->getMess();
							if(!$check){
								$them=$in->Insert($macongan,$tencongan,$tocongtac,$diadiem,$sodienthoai);
								if ($them) {
									$errM = "Thêm mới thành công";
								}else{
									$errM = "Thêm mới thất bại";
								}
							}else{
								$errM="Trùng mã công an viên";
							}
							
						} catch (Exception $e) {
							$errTCX = $e->getMessage();
						}
						

					}


				}

				if(isset($_POST['update'])){
					$vali = new Validate();
					$vali->setName('macongan');
					$macongan= $vali->CheckText($_POST['macongan']);
					$vali->setName('tencongan');
					$tencongan = $vali->CheckText($_POST['tencongan']);
					$vali->setName('tocongtac');
					$tocongtac = $vali->CheckText($_POST['tocongtac']);
					$vali->setName('diadiem');
					$diadiem = $vali->CheckText($_POST['diadiem']);
					$vali->setName('sodienthoai');
					$sodienthoai = $vali->CheckNumber($_POST['sodienthoai']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errM = isset($Mess['err']['macongan'])?$Mess['err']['macongan']:null;
						$errD= isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
						$errT= isset($Mess['err']['tencongan'])?$Mess['err']['tencongan']:null;
						$errTCT=isset($Mess['err']['tocongtac'])?$Mess['err']['tocongtac']:null;
						$errN= isset($Mess['err']['sodienthoai'])?$Mess['err']['sodienthoai']:null;
					}else{
						$macongan = $Mess['success']['macongan'];
						$tencongan= $Mess['success']['tencongan'];
						$sodienthoai = $Mess['success']['sodienthoai'];
						$tocongtac = $Mess['success']['tocongtac'];
						$diadiem = $Mess['success']['diadiem'];
						$up = new infoAdmin();
						$check = $up->Check($macongan);
						$check=$up->getMess();
						if($check){
							try {
								$in=new infoAdmin();
								$them=$in->Update($macongan,$tencongan,$tocongtac,$diadiem,$sodienthoai);
								if ($them) {
									$errM = "Cập nhật thành công";
								}else{
									$errM= "Cập nhật thất bại";
								}
							} catch (Exception $e) {
								$errM = $e->getMessage();
							}
						}else{
							$errM="Tên đăng nhập không tồn tại";
						}

						
						

					}
				}


				if (isset($_POST['delete'])) {
					$vali = new Validate();
					$vali->setName('macongan');
					$macongan= $vali->CheckText($_POST['macongan']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errM = isset($Mess['err']['macongan'])?$Mess['err']['macongan']:null;
					}else{
						$macongan = $Mess['success']['macongan'];
						$up = new infoAdmin();
						$check = $up->Check($macongan);
						$check=$up->getMess();
						if($check){
							try {
								$in=new infoAdmin();
								$xoa=$in->Delete($macongan);
								if ($xoa) {
									$errM = "Xóa thành công";
								}else{
									$errM= "Xóa thất bại";
								}
							} catch (Exception $e) {
								$errM = $e->getMessage();
							}
						}else{
							$errM="Tên đăng nhập không tồn tại";
						}
					}
				}
				require_once '../view/infoAdmin.php';
				break;
		

			case 'dangkyxe1':
				if(isset($_POST['submit'])){
					$vali = new Validate();
					$vali->setName('tendangnhap');
					$tendangnhap= $vali->CheckNumber($_POST['tendangnhap']);
					$vali->setName('nhanhieu');
					$nhanhieu = $vali->CheckText($_POST['nhanhieu']);
					$vali->setName('mauxe');
					$mauxe = $vali->CheckText($_POST['mauxe']);
					$vali->setName('theloai');
					$theloai = $vali->CheckText($_POST['theloai']);
					$vali->setName('loaixe');
					$loaixe = $vali->CheckText(isset($_POST['loaixe'])?$_POST['loaixe']:null);
					$vali->setName('sokhung');
					$sokhung = $vali->CheckText($_POST['sokhung']);
					$vali->setName('somay');
					$somay = $vali->CheckText($_POST['somay']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errT = isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
						$errTCX= isset($Mess['err']['nhanhieu'])?$Mess['err']['nhanhieu']:null;
						$errM= isset($Mess['err']['mauxe'])?$Mess['err']['mauxe']:null;
						$errD=isset($Mess['err']['theloai'])?$Mess['err']['theloai']:null;
						$errN= isset($Mess['err']['loaixe'])?$Mess['err']['loaixe']:null;
						$errSK= isset($Mess['err']['sokhung'])?$Mess['err']['sokhung']:null;
						$errSM= isset($Mess['err']['somay'])?$Mess['err']['somay']:null;
					}else{
						$tendangnhap = $Mess['success']['tendangnhap'];
						$nhanhieu= $Mess['success']['nhanhieu'];
						$mauxe = $Mess['success']['mauxe'];
						$theloai = $Mess['success']['theloai'];
						$loaixe = $Mess['success']['loaixe'];
						$sokhung = $Mess['success']['sokhung'];
						$somay = $Mess['success']['somay'];
						try {
							$in=new Moto();
							$check = new Login();
							$check1= $check->Check1($tendangnhap);
							$check1=$check->getMess();
							if($check1){
								$them=$in->Insert($tendangnhap,$nhanhieu,$mauxe,$theloai,$loaixe,$sokhung,$somay);
								if ($them) {
									$errT = "Thêm mới thành công";
								}else{
									$errT = "Thêm mới thất bại";
								}
							}else{
								$errT="Tên đăng nhập không tồn tại";
							}
								
						} catch (Exception $e) {
							$errT = $e->getMessage();
						}
						

					}


				}

				require_once '../view/dangkyxe.php';
				break;
			


			case 'quanlyxe1':
				if(isset($_POST['submit'])){
					$vali = new Validate();
					$vali->setName('tendangnhap');
					$tendangnhap= $vali->CheckNumber($_POST['tendangnhap']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errmatainan = isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
					}else{
						$tendangnhap = $Mess['success']['tendangnhap'];
						$moto= new Moto();
						$check=$moto->Check($tendangnhap);
						$check=$moto->getMess();
						if($check){
							$xe=$check;
						}else{
							$errmatainan="Không có thông tin xe của tài khoản này!";
						}
					}
				}
				require_once'../view/quanlyxe.php';
				exit();
				break;
			case 'dexe':
				# code...
				break;
			case 'upxe':
				# code...
				break;
				
			
			case 'traodoi':
				require_once'../view/quanlytraodoixe.php';
				exit();
				break;

			case 'quanlytraodoi':
				if(isset($_POST['submit'])){
					$vali = new Validate();
					$vali->setName('maxe');
					$maxe= $vali->CheckText($_POST['maxe']);
					$vali->setName('chucu');
					$chucu= $vali->CheckNumber($_POST['chucu']);
					$vali->setName('chumoi');
					$chumoi= $vali->CheckNumber($_POST['chumoi']);
					$vali->setName('maca');
					$maca= $vali->CheckNumber($_POST['maca']);
					$vali->setName('ngaydoi');
					$ngaydoi= $vali->CheckText($_POST['ngaydoi']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errMaxe = isset($Mess['err']['maxe'])?$Mess['err']['maxe']:null;
						$errchucu = isset($Mess['err']['chucu'])?$Mess['err']['chucu']:null;
						$errchumoi = isset($Mess['err']['chumoi'])?$Mess['err']['chumoi']:null;
						$errmaca = isset($Mess['err']['maca'])?$Mess['err']['maca']:null;
						$errngaydoi = isset($Mess['err']['ngaydoi'])?$Mess['err']['ngaydoi']:null;

					}else{
						$maxe = $Mess['success']['maxe'];
						$chumoi = $Mess['success']['chumoi'];
						$chucu = $Mess['success']['chucu'];
						$ngaydoi = $Mess['success']['ngaydoi'];
						$maca = $Mess['success']['maca'];
						$change = new Traodoi();
						$check = $change->Check($chucu,$maxe);
						$check=$change->getMess();
						if($check){
							$in = $change->Insert($chucu,$chumoi,$maca,$maxe,$ngaydoi);
							if($in){
								$errMaxe="Thêm mới thành công";
								$upchange = $change->UpdateChange($maxe,$chumoi);
							}else{
								$errMaxe = "Thêm mới không thành công!";
							}
						}else{
							$errMaxe="Chủ này chưa từng đăng ký xe hoặc không có mã xe này";
						}
					}
				}

				require_once '../view/quanlytraodoixe.php';
				exit();
				break;


			case 'quanlybienban':
				 $loi =new LoiViPham();
                $show =$loi->ShowAll();
                $show=$loi->getMess();
				require_once '../view/quanlybienban.php';
				exit();
				break;

			case 'bienban':
				if(isset($_POST['submit'])){
					$vali = new Validate();
					$vali->setName('tendangnhap');
					$tendangnhap= $vali->CheckNumber($_POST['tendangnhap']);
					$vali->setName('maca');
					$maca= $vali->CheckNumber($_POST['maca']);
					$vali->setName('thoigian');
					$thoigian= $vali->CheckText($_POST['thoigian']);
					$vali->setName('diadiem');
					$diadiem= $vali->CheckText($_POST['diadiem']);
					$vali->setName('mavp');
					$mavp= $vali->CheckText($_POST['mavp']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errtendangnhap = isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
						$errmaca = isset($Mess['err']['maca'])?$Mess['err']['maca']:null;
						$errthoigian = isset($Mess['err']['thoigian'])?$Mess['err']['thoigian']:null;
						$errdiadiem = isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
						$errmavp = isset($Mess['err']['mavp'])?$Mess['err']['mavp']:null;

					}else{
						$tendangnhap = $Mess['success']['tendangnhap'];
						$maca = $Mess['success']['maca'];
						$thoigian = $Mess['success']['thoigian'];
						$diadiem = $Mess['success']['diadiem'];
						$mavp = $Mess['success']['mavp'];
						try {

							$tk = new Taikhoan();
							$check = $tk->Check($tendangnhap);
							$check=$tk->getMess();
							if($check){
								$ca = new infoAdmin();
								$checkca = $ca->Check($maca);
								$checkca = $ca->getMess();
								if($checkca){
									$mvp = new LoiViPham();
									$checklvp = $mvp->Check($mavp);
									if($checklvp){
										$bb = new Bienban();
										$in = $bb->Insert($tendangnhap,$maca,$thoigian,$diadiem,$mavp);
										if($in){
											$errtendangnhap = "Thêm mới biên bản thành công";
										}else{
											$errtendangnhap ="Thêm mới biên bản thất bại";
										}
									}else{
										$errtendangnhap="Mã vi phạm không tồn tại";
									}
								}else{
									$errtendangnhap = 'Mã công an viên không tồn tại';
								}
							}else{
								$errtendangnhap = 'Tên đăng nhập chủ vi phạm không tồn tại';
							}
						} catch (Exception $e) {
							$e->getMassage();
						}
					}

				}

				if(isset($_POST['update'])){
					$vali = new Validate();
					$vali->setName('tendangnhap');
					$tendangnhap= $vali->CheckNumber($_POST['tendangnhap']);
					$vali->setName('maca');
					$maca= $vali->CheckNumber($_POST['maca']);
					$vali->setName('thoigian');
					$thoigian= $vali->CheckText($_POST['thoigian']);
					$vali->setName('diadiem');
					$diadiem= $vali->CheckText($_POST['diadiem']);
					$vali->setName('mavp');
					$mavp= $vali->CheckText($_POST['mavp']);
					$Mess=$vali->getMess();
					if(!empty($Mess['err'])){
						$errtendangnhap = isset($Mess['err']['tendangnhap'])?$Mess['err']['tendangnhap']:null;
						$errmaca = isset($Mess['err']['maca'])?$Mess['err']['maca']:null;
						$errthoigian = isset($Mess['err']['thoigian'])?$Mess['err']['thoigian']:null;
						$errdiadiem = isset($Mess['err']['diadiem'])?$Mess['err']['diadiem']:null;
						$errmavp = isset($Mess['err']['mavp'])?$Mess['err']['mavp']:null;

					}else{
						$tendangnhap = $Mess['success']['tendangnhap'];
						$maca = $Mess['success']['maca'];
						$thoigian = $Mess['success']['thoigian'];
						$diadiem = $Mess['success']['diadiem'];
						$mavp = $Mess['success']['mavp'];
						$tk = new Taikhoan();
						$check = $tk->Check($tendangnhap);
						$check=$tk->getMess();
						if($check){
							$up = new Bienban();
							$update = $up->Update($tendangnhap,$maca,$thoigian,$diadiem,$mavp);
							if($update){
								$errtendangnhap="update thành công!";
							}else{
								$errtendangnhap="Update thất bại";
							}
						}
						else
						{
							$errtendangnhap = 'Tên đăng nhập chủ vi phạm không tồn tại';
						}
					}
				}


				
				require_once '../view/quanlybienban.php';
				exit();
				break;


			case 'viewluat':
				$show = new LoiViPham();
				$showall = $show->ShowAll();
				$showall =$show->getMess();
				if($showall){
					$showall=$showall;
				}else{
					echo null;
				}
				require_once '../view/viewLuat.php';
				exit();
				break;


			case 'viewluatAdmin':
				$show = new LoiViPham();
				$showall = $show->ShowAll();
				$showall =$show->getMess();
				if($showall){
					$showall=$showall;
				}else{
					echo null;
				}
				require_once '../view/viewluatAdmin.php';
				exit();
				break;
			// echo "<pre>";
				// print_r($Mess);
				// echo "</pre>";


			case 'viewBB':
				$name = $_SESSION['user']['tendangnhap'];
				$bb = new Bienban();
				$show = $bb->Check($name);
				$show=$bb->getMess();
				print_r($show);
				require_once '../view/viewbienbanuser.php';
				exit();

				break;

}

 ?>