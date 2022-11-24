<?php
//admin
session_start();
@$admin = $_SESSION['admin'];
if(isset($admin) == true) {
	header('location: index.php');
	die();
}
@$pwd = $_POST['pwd'];
@$pwd_c = "cresthoteladmin123";
if(isset($_POST['submit'])) {
	if($pwd === $pwd_c) {
		$_SESSION['admin'] = $pwd;
		header('location: index.php');
		die();
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>admin</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
	</head>
	<body>
		<div class="login-ad">
			<h1 class="header">ADMIN</h1>
			<form action="" method="post">
				<input type="password" name="pwd" required="">
				<input type="submit" name="submit" value="access">
			</form>
		</div>
	</body>
</html>
