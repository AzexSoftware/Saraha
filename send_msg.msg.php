<?php

	/*******************************************************************
	** Name:         (Saraha "Send_msg.msg" Page)                      *
	** Description:  This file includes the textarea to fill in your   *
	*                Message 								           *
	** Contains:     (Navbar - textarea - button - footer)             *
	** Author:       ((AZEX Team))                                     *
	** Date:         3 March 2018                                      *
	********************************************************************/

	//initialize the (pageStyle) for the Register page
	$pageStyle = "reg.css";
	$fixed_footer = true;

	//initialize the NAME of the (links) in the Nav-bar
	$navbar = array(
		'link_1' => array(
			'name' => 'Home',
			'href' => 'index.php'
		),
		'link_2' => array(
			'name' => 'Register',
			'href' => 'register.php'
		),
		'link_3' => array(
			'name' => 'Login',
			'href' => 'login.php'
		)
	);

	// add the initial files (Navbar - others)
	include "ini/ini.paths.php";

	// if the sender has an account on the website, DO the following:
	if(isset($_SESSION['name'])){
		$n = $_SESSION['name'];
		$que = "SELECT * FROM `users` WHERE name = '$n'";
		$res = mysqli_query($conn , $que);
		$selescted = mysqli_fetch_assoc($res);
		$myid = $selescted['id'];
		$_SESSION['id'] = $myid;
		//echo $myid;
	}
	$name = $_POST['name'];

	$query = "SELECT * FROM `users` WHERE name = '$name'";
	$result = mysqli_query($conn , $query);

	$selesctedString = mysqli_fetch_assoc($result);
	$id = $selesctedString['id'];



?>
	<!-- Start the (send_msg.msg) Page  -->
	            </div>
	        </div>
	    </div>
	    <div class="msg">
			<form action="p.php" method="post">
				<textarea name="message"></textarea>
				<input type="hidden" name="hidden" value="<?php  echo $id ?>">
				<input type="submit" name="submit" value="Send">
			</form>
		</div>
	<!-- Start the (send_msg.msg) Page  -->

	<!-- Add the footer to the page  -->
	<?php include $templates . "footer.php"; ?>
