<?php
	#database connection
	#server = localhost or 127.0.0.1
	#username = root
	#password = N/A
	#database-name = crest_hotel
	$db = mysqli_connect('localhost','root','','crest_hotel');
	if(!$db) {
		#check database connection~
		die("not connected");
	}
?>