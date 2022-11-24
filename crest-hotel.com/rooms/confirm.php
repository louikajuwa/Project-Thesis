<?php
session_start();
include "../conf.php";

@$confirm_session = $_SESSION['confirm'];
if(isset($confirm_session) == true) {
	header('location: thankyou.php');
	die();
}


@$email_session = $_SESSION['email'];
@$name_session = $_SESSION['name'];
//session			
@$guests = $_SESSION['guests'];
@$num = $_SESSION['num'];
@$time = $_SESSION['time'];
@$date = $_SESSION['date'];
@$room  = $_SESSION['room'];
@$merid = $_SESSION['merid'];
@$num_room = $_SESSION['num_room'];
@$duration  = $_SESSION['duration'];
@$submit_sta = $_SESSION['sta_sub'];
@$submit_fam = $_SESSION['fam_sub'];
@$confirm = $_POST['confirm'];
@$cancel = $_POST['cancel'];
@$price = '';


#------------family room----------------
@$family_price = $_SESSION['price'];
@$total = '';

if($duration == '12 hours') {

	$total = $family_price;

	if($num_room == 1) {
		$total = $family_price;
	} elseif($num_room == 2){
		$total = $family_price * $num_room;
	} elseif($num_room == 3){
		$total = $family_price * $num_room;
	} elseif($num_room == 4){
		$total = $family_price * $num_room;
	} elseif($num_room == 5){
		$total = $family_price * $num_room;
	}

} 
if($duration == '24 hours') {
	
	$total = $family_price;
	$total = $total * 2;
	$family_price = $total;

	if($num_room == 1) {
		$total = $family_price;
	} elseif($num_room == 2){
		$total = $family_price * $num_room;
	} elseif($num_room == 3){
		$total = $family_price * $num_room;
	} elseif($num_room == 4){
		$total = $family_price * $num_room;
	} elseif($num_room == 5){
		$total = $family_price * $num_room;
	}
 }
 $price = $total;
#------------standard room----------------
@$num_room_sta = $_SESSION['num_room'];
@$standard_price1 = $_SESSION['price_1'];
@$standard_price2 = $_SESSION['price_2'];
@$total1 = '';

if($duration == '6 hours') {

	$total1 = $standard_price1;

	if($num_room == 1) {
		$total1 = $standard_price1;
	} elseif($num_room ==2){
		$total1 = $standard_price1 * $num_room;
	} elseif($num_room == 3){
		$total1 = $standard_price1 * $num_room;
	} elseif($num_room == 4){
		$total1 = $standard_price1 * $num_room;
	} elseif($num_room == 5){
		$total1 = $standard_price1 * $num_room;
	}

} 
if($duration == '12 hours') {

	$total1 = $standard_price2;
	
	if($num_room == 1) {
		$total1 = $standard_price2;
	} elseif($num_room ==2){
		$total1 = $standard_price2 * $num_room;
	} elseif($num_room == 3){
		$total1 = $standard_price2 * $num_room;
	} elseif($num_room == 4){
		$total1 = $standard_price2 * $num_room;
	} elseif($num_room == 5){
		$total1 = $standard_price2 * $num_room;
	}

} 
if($duration == '24 hours') {

	$total1 = $standard_price2;
	$total1 = $total1 * 2;
	$standard_price2 = $total1;
	
	if($num_room == 1) {
		$total1 = $standard_price2;
	} elseif($num_room ==2){
		$total1 = $standard_price2 * $num_room;
	} elseif($num_room == 3){
		$total1 = $standard_price2 * $num_room;
	} elseif($num_room == 4){
		$total1 = $standard_price2 * $num_room;
	} elseif($num_room == 5){
		$total1 = $standard_price2 * $num_room;
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
		
		<div class="content-fill-form"><br>
			<center><h1 class="header">Confirmation</h1><hr width="100px">
			<div class="align-left">
				<p>Email : <span><?php echo htmlentities($email_session); ?></span></p>
				<p>Full Name : <span><?php echo htmlentities($name_session); ?></span></p>
				<p>Mobile Number : <span><?php echo htmlentities($num); ?></span></p>
				<p>Time Arrival : <span><?php echo htmlentities($time)." ".htmlentities($merid); ?></span></p>
				<p>Duration : <span><?php echo htmlentities($duration); ?></span></p>
				<p>Date : <span><?php echo htmlentities($date); ?></span></p>
				<p>Room : <span><?php echo htmlentities($room); ?></span></p>
				<p>Number of Room : <span><?php echo htmlentities($num_room); ?></span></p>
				<p>Guests : <span><?php echo htmlentities($guests); ?></span></p>
				<p>Total Price</p>
			</div>
			<h1 class="header">P 
			<?php 
			if(isset($submit_sta) == true) {
				$price = $total1;
				echo htmlentities($price);
			} elseif(isset($submit_fam) == true){
				$price = $total;
				echo htmlentities($price);
			}
			if(isset($confirm)) {
				@$_SESSION['confirm'] = $confirm;
			mysqli_query($db,"INSERT INTO user_reservation (email,name,num,time_arrival,date,room,merid,num_rooms,duration,price,guests) VALUES ('$email_session','$name_session','$num','$time','$date','$room','$merid','$num_room','$duration','$price','$guests')");
			mysqli_close($db);
			header('location: thankyou.php');
			}
			if(isset($cancel)) {
				session_destroy();
				header('location: ../index.php');
			die();
			}
			?>
			</h1>
			
			<br>
			<form action="" method="POST">
				<input class="submit-1" type="submit" name="confirm" value="Confirm Reservation">
				<input class="submit-1" type="submit" name="cancel" value="Cancel Reservation">
			</form>
		</div>	

	</body>

</html>