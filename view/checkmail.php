<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Check Email</title>
</head>
<body>
	<form action="../controller/xuli.php" method="post">
		<input type="hidden" name="action" value="kiemtraemail">
		<input type="number" name="checkmail" placeholder="Nhập mã số...">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
<form class="form-qltainan" action="../controller/xuli.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="quanlytraodoi">
                        <p><?php echo isset($errmatainan) ? $errmatainan : null; ?></p>
                        <input class="ip-qltainan" type="text" name="maxe" placeholder="Mã xe...">
                        <p><?php echo isset($errmacongan) ? $errmacongan : null; ?></p>
                        <input class="ip-qltainan" type="text" name="chucu" placeholder="Tên đăng nhap chủ cũ...">
                        <p><?php echo isset($errdiadiem) ? $errdiadiem : null; ?></p>
                        <input class="ip-qltainan" type="text" name="chumoi" placeholder="Tên đăng nhap chủ mới...">
                         <p><?php echo isset($errdiadiem) ? $errdiadiem : null; ?></p>
                        <input class="ip-qltainan" type="text" name="maca" placeholder="Mã công an...">
                         <p><?php echo isset($errdiadiem) ? $errdiadiem : null; ?></p>
                        <input class="ip-qltainan" type="datetime" name="ngaydoi" placeholder="Ngày đổi...">
                        <input class="ip-submit" type="submit" value="Submit" name="submit">
                        <input class="ip-submit" type="submit" name="update" value="Update">
                        <input class="ip-submit" type="submit" value="Delete" name="delete">
                    </form>