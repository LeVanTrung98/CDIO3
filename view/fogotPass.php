<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="../controller/xuli.php" method="post">
		<input type="hidden" name="action" value="fogetPass">
		<p><?php echo isset($errT)?$errT:null;  ?></p>
		<input type="text" name="taikhoan" placeholder="Tên đăng nhập...">
		<p><?php echo isset($errP)?$errP:null;  ?></p>
		<input type="password" name="pass" placeholder="PassWord...">
		<p><?php echo isset($errR)?$errR:null;  ?></p>
		<input type="password" name="repass" placeholder="Re-PassWord...">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>