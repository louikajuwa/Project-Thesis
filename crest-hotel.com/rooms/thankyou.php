<?php
session_start();
@$name_session = $_SESSION['name'];
@$msg = $_SESSION['msg'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Thankyou! </title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta charset="utf-8">
		<meta name="author" content="">
		<meta name="" content="">
		<meta name="" content="">
		<meta property="" content="">
		<meta property="" content="">
		<meta property="" content="">
		<style type="text/css">
			body {
				background: linear-gradient(to left,rgb(255,204,0,0.7),rgb(242,153,38,0.7),rgb(230,102,77,0.7),rgb(217,51,115,0.7),rgb(204,0,153,0.7)),url(../images/bg2.png);
				width: 100%;
				height: 100%;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
				background-position: center;
			}
		</style>
	</head>

	<body class="body-color">
		
		<div class="content-fill-form">
			<center>
				<h1 class="header">THANK YOU</h1><hr>
				<p>Thankyou <span><?php echo htmlentities($name_session);?></span><br>come again.</p><br>
				<?php echo "<p><span>".htmlentities($msg)."</span></p>";?>
			</center>
		</div>


		<footer>
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../about.php">About & Contact</a></li>
			</ul>
		</footer>
	</body>

</html>