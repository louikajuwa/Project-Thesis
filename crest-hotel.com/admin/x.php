<?php
include "../conf.php";
$id = $_GET['id'];

if(!$id) {
	header('location: index.php');
}
$id = filter_var($id,FILTER_SANITIZE_NUMBER_INT);

  $sql = "DELETE FROM user_reservation WHERE ID = {$id}";
   
   if (mysqli_query($db, $sql)) {
      header('location: index.php');
   } else {
      echo "Error deleting record: " . mysqli_error($db);
   }
   mysqli_close($db);
?>