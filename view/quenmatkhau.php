<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quên tài khoản</title>
</head>
<body>
	<form action="../controller/xuli.php" method="post">
		<input type="hidden" name="action" value="quenmatkhau">
		<p><?php echo isset($errE)?$errE :null  ?></p>
		<input type="email" name="email" placeholder="Nhập Email...">
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>