<?php
	session_start();

	// Add the connection to the database
	include "ini/database.php";

	if (isset($_POST['submit'])) {

		$idone = $_POST['hiddenm'];
		$sel = "SELECT * FROM `message` WHERE idone = '$idone'";
		$re = mysqli_query($conn , $sel);
		$strre = mysqli_fetch_assoc($re);
		$sender = $strre['sender'];
		$id = $strre['id'];

		$message = $_POST['Replay'];

		$que = "INSERT INTO `message`(id , time , message , sender) VALUES ('$sender' , CURTIME() , '$message' , '$id')";
		$res = mysqli_query($conn , $que);
		if ($res){
			header('location: messages.php?id=' . $id);
			exit();
			}
		}

	?>
