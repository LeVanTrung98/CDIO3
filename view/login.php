<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="../public/css/style.css">
</head>
<body>
	<div id="wrapper" style="background-color:rgb(173, 240, 173);">
		<div id="header">
			<div id="top1">
				<img src="../public/imges/logo.png" height="170px" width="140px">
			</div>
			<div id="top2">
				<p id="p1"><b>QUẢN LÝ THÔNG TIN XE GẮN MÁY </br> TẠI TP.ĐÀ NẴNG</b></p>
				<p id="p2"><b> BỘ CÔNG AN </b></p>
			</div>
			<div id="top3">
				<img src="../public/imges/1.png" height="165px" width="330px">
			</div>
		</div>
		<div class="main-login">
			<div style="margin-top: 100px;margin-bottom: 40px;">
                <span style="text-align:center;"><h1>ĐĂNG NHẬP TÀI KHOẢN</h1></span>
            </div>
			<div class="form-login">
				<form class="form-qltainan" action="" method="post">
					<input type="hidden" name="action" value="login">
					<p><?php echo isset($errT)?$errT:null; ?></p>
					<input style="margin-bottom:20px;" class="ip-qltainan" type="texts" name="tendangnhap" placeholder="Tên đăng nhập...">
					<p><?php echo isset($errP)?$errP:null; ?></p>
					<input style="margin-bottom:10px;" class="ip-qltainan" type="password" name="pass" placeholder="PassWord...">
					
					<div style="margin-bottom:10px; text-align:right">
						<a href="#" style="color:rgb(155, 153, 153);"><i>Quên mật khẩu?</i></a>
					</div>

					<input class="ip-submit" type="submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
		<div class="footer" style="background-color:rgb(248, 246, 246)">
			<div class="footer1_menu1">
				<ul>
					<li><a href="">Trang Chủ</a></li>
					<li><a href="">Chỉnh Sửa Thông Tin</a></li>
					<li><a href="">Liên Hệ</a></li>
					<li><a href="">Tin Tức Liên Quan</a></li>
				</ul>
			</div>
        </div>
	</div>
</body>
</html>