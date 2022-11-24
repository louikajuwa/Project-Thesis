<?php
include 'conf.php';
session_start();
//if session started go to rooms/rooms.php
if(isset($_SESSION['email']) && isset($_SESSION['name']) == true) {
	header('location: rooms/index.php');
	die();
} else {
	//else do nothing
}
$result = mysqli_query($db,"SELECT * FROM admin");
$x = mysqli_fetch_assoc($result);

//variables
@$email_session = $_POST['email_session'];
@$name_session = $_POST['name_session'];
@$submit = $_POST['submit'];
@$msg = "";
if(isset($submit)) {
	if($email_session === '' && $name_session === '') {
		$msg = "<p>Please fill out the field.</p>";
	} else {
		$_SESSION['email'] = $email_session;
		$_SESSION['name'] = $name_session;
		header('location: rooms/index.php');
	}
}
?>
<!DOCTYPE html>
<!-- Crest-hotel Thesis -->
<html>
	<head>
		<title> Crest Hotel | Home </title>
		<!-- external css -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<meta charset="utf-8">
		<meta name="author" content="">
		<meta name="" content="">
		<meta name="" content="">
		<meta property="" content="">
		<meta property="" content="">
		<meta property="" content="">
		<!-- internal css -->
		<style type="text/css">
			body {
				background: linear-gradient(to left,rgb(255,204,0,0.7),rgb(242,153,38,0.7),rgb(230,102,77,0.7),rgb(217,51,115,0.7),rgb(204,0,153,0.7)),url(images/bg.jpg);
				width: 100%;
				height: 100%;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
				background-position: center;
			}
		</style>
	</head>

	<body>

		<div class="content">
			<div class="content-padding">
				<h1>Crest Hotel</h1>
				<div class="user-sub">
					<center>
					<form action="" method="post">
						<input class="user-input" type="email" placeholder="Email*" name="email_session" required>
						<input class="user-input" type="text" placeholder="Full Name" name="name_session" required>
						<input class="user-submit" type="submit" name="submit" value="Continue" 
						<?php 
						echo $x['disabled'];
						?>>
					</form>
				</center>
					<div class="user-available-room">
						<p>
						<?php 
							echo $x['enabled'];
						?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<footer>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About & Contact</a></li>
			</ul>
		</footer>
	</body>

</html>