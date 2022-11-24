<?php
include "../conf.php";
session_start();
@$admin = $_SESSION['admin'];
if(isset($admin) == false) {
	header('location: login.php');
	die();
}
@$_POST['disabled'];
@$ad = $_POST['disabled'];

@$_POST['enabled'];
@$ad1 = $_POST['enabled'];
if(isset($ad)) {
	mysqli_query($db,"UPDATE admin SET disabled = 'disabled',enabled = 'full booked' WHERE n=1");
}
if(isset($ad1)) {
	mysqli_query($db,"UPDATE admin SET disabled = 'enabled',enabled = 'available rooms' WHERE n=1");
}
?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<title></title>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<meta charset="utf-8">
		<meta name="author" content="">
		<meta name="" content="">
		<meta name="" content="">
		<meta property="" content="">
		<meta property="" content="">
		<meta property="" content="">
	 </head>
	 <body class="bg">
	 	<nav>
	 		<form action="" method="post">
	 			<a href="out.php">logout</a>
	 			<input type="submit" name="disabled" value="Full Booked">
	 			<input type="submit" name="enabled" value="Available Rooms">
	 		</form>

	 	</nav>
	 <center>
<table>
	<tr>
		<th>ID</th>
		<th>Email</th>
		<th>Name</th>
		<th>Number</th>
		<th>Duration</th>
		<th>Time Arrival</th>
		<th>Type of Room</th>
		<th>Number of Room</th>
		<th>Guests</th>
		<th>Price</th>
		<th>Action</th>
	</tr>
<?php
@$page = $_GET['page'];
if($page == '' || $page == '1') {
    @$page1 = 0;
} else {
    @$page1 = ($page*10)-10;
}

    $q = "SELECT * FROM user_reservation limit $page1,10";
    $result = mysqli_query($db,$q);

     while(@$x = mysqli_fetch_assoc($result)) { 
?>
	<tr>
      <td><?php echo htmlentities($x['ID']); ?></td>
      <td><?php echo htmlentities($x['email']); ?></td>
      <td><?php echo htmlentities($x['name']); ?></td>
      <td><?php echo htmlentities($x['num']); ?></td>
      <td><?php echo htmlentities($x['duration']); ?></td>
      <td><?php echo htmlentities($x['time_arrival'])." ".htmlentities($x['merid']); ?></td>
      <td><?php echo htmlentities($x['room']); ?></td>
      <td><?php echo htmlentities($x['num_rooms']); ?></td>
      <td><?php echo htmlentities($x['guests']); ?></td>
      <td>P <?php echo htmlentities($x['price']); ?></td>
      <td><a href="x.php?id=<?php echo htmlentities($x['ID']); ?>" onclick="return confirm('Confirming Room Reservation.')">Confirm</a> |
      	  <a href="x.php?id=<?php echo htmlentities($x['ID']); ?>" onclick="return confirm('Are you sure you want to cancel this reservation?')">Cancel</a>
      </td>
    </tr>
<?php }
    // algorithm
    $q1 = "SELECT * FROM user_reservation";
    $result1 = mysqli_query($db,$q1);
    $c = mysqli_num_rows($result1);
        $a = $c/10;
        $a = ceil($a);
?>
    </table>
    <div class="page"><br>
         <pre>[ pages ]</pre><br>
	     <ul>
	        <?php for($b = 1;$b <= $a;$b++) { ?>
	             <li><a href="index.php?page=<?php echo $b; ?>"><?php echo $b; ?></a></li>
	        <?php } ?>
	     </ul>
 	</div>
 </center>
	 </body>
 </html>