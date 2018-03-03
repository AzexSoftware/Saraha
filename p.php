<?php
	session_start();

	// include the connection to the database
	include "ini/database.php";

	$message = $_POST['message'];
	$id = $_POST['hidden'];

	if (isset($_SESSION['name'])){

		$name = $_SESSION['name'];

		$s = "SELECT * FROM `users` WHERE name = '$name'";
		$r = mysqli_query($conn , $s);
		$str = mysqli_fetch_assoc($r);
		$iid = $str['id'];

		$que = "INSERT INTO `message`(id , time , message , sender) VALUES ('$id' , CURTIME() ,'$message' , '$iid')";
		$insert = mysqli_query($conn , $que);
		if (!$insert){
			echo "string";
		}

		// print the successful Message
		$msg = "your Message was sent successfully!";
		header("location: send_msg.person.php?msg=" . urlencode($msg));
		exit();

	}

	// insert the massage into the database, TAKEN FROM (Guest)
	$que = "INSERT INTO `message`(id , time , message) VALUES ('$id' , CURTIME() ,'$message')";
	$insert = mysqli_query($conn , $que);
	if (!$insert){
		echo "string";
	}

	// print the successful Message
	$msg = "your Message was sent successfully!";
	header("location: send_msg.person.php?msg=" . urlencode($msg));
	exit();
 ?>
