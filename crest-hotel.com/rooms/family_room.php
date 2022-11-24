<?php
	session_start();
	@$confirm_session = $_SESSION['confirm'];
	if(isset($confirm_session) == true) {
		header('location: thankyou.php');
		die();
	}
	@$submit1 = $_SESSION['sta_sub'];
	if(isset($submit1) == true) {
		$_SESSION['msg'] = "You already reserved a room.";
		header('location: confirm.php');
		die();
	} else {
	//else do nothing
	}
	include "../conf.php"; 
	// session
	@$email_session = $_SESSION['email'];
	@$name_session = $_SESSION['name'];
	//var email - name
	@$email = htmlentities($_POST['email']);
	@$name = htmlentities($_POST['name']);
	//var[s]
	@$num = htmlentities($_POST['num']);
	@$time = htmlentities($_POST['time']);
	@$duration = htmlentities($_POST['duration']);
	@$date = htmlentities($_POST['date']);
	@$room = htmlentities($_POST['room']);
	@$merid = htmlentities($_POST['merid']);
	@$num_room = htmlentities($_POST['num_room']);
	@$guests = htmlentities($_POST['guests']);
	//submit[post]
	@$submit = htmlentities($_POST['submit']);
 

	if(isset($submit)) {
		//checking if theres a value if none == ''
		if($num === '' && $time === '' && $duration === '' && $date === '' && $room === '' && $merid === '') 
		{
		
		} else {
			@$email_session = $_SESSION['email'];
			@$name_session = $_SESSION['name'];
			//sessions
			@$_SESSION['num'] = $num;
			@$_SESSION['time'] = $time;
			@$_SESSION['duration'] = $duration;
			@$_SESSION['date'] = $date;
			@$_SESSION['room'] = $room;
			@$_SESSION['merid'] = $merid;
			@$_SESSION['guests'] = $guests;
			@$_SESSION['num_room'] = $num_room;
			@$_SESSION['price'] = '590';
			@$_SESSION['fam_sub'] = $submit;
			header('location: confirm.php');
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Crest Hotel | Family Room </title>
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
			<center><h1 class="header">Family Room Reservation</h1><hr width="100px">
			<form action="" method="POST">
				<div class="column">
					<label>Email</label><br>
					<input class="input-margin" type="email" name="email" value="<?php echo $email_session; ?>" placeholder="Email" required><br>
					
					<label>Full Name</label><br>
					<input class="input-margin" type="text" name="name" value="<?php echo $name_session; ?>" placeholder="Full Name" required><br>
					
					<label>Number</label><br>
					<input class="input-margin" type="text" placeholder="Mobile Number" name="num" required><br>
					
					<label>Time Arrival</label><br>
					<input class="input-margin" type="time" placeholder="Time Arrival" name="time" required><br>

					<label>Time Meridiem</label><br>
					<select class="input-margin" name="merid" required>
						<option>AM</option>
						<option>PM</option>
					</select><br>
				</div>
				<label>Duration</label><br>
				<select class="input-margin" placeholder="Duration" name="duration" required>
					<option>12 hours</option>
					<option>24 hours</option>
				</select><br>
				
				<label>Date</label><br>
				<input class="input-margin" placeholder="Data" type="date" name="date" required><br>
				
				<label>Room</label><br>
				<select class="input-margin" name="room" required>
					<option value="Family Room">Family Room</option>
				</select><br>

				<label>Number of Room</label><br>
				<select class="input-margin" name="num_room" required>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select><br>
				
				<label>Number of Guest</label><br>
				<select class="input-margin" name="guests" required>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
				</select><br>
				<input type="submit" name="submit" class="submit-1" value="Continue">
				<a href="../rooms/index.php" class="submit-1">Back</a>
			</form>
			</center>
		</div>	

	</body>

</html>