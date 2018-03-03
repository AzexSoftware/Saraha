<?php
	/*******************************************************************
	** Name:         (Saraha "Send_Msg" Page)                          *
	** Description:  This file includes the Login Form (HTML)          *
	*                and Checking the user data into Database (php)    *
	*                to show the his messages or not ()                *
	** Contains:     (Navbar - Form - footer)                          *
	** Author:       ((AZEX Team))                                     *
	** Date:         3 March 2018                                      *
	********************************************************************/
	// Start the session
	session_start();
	$id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : NULL;

	//initialize the (pageStyle) for the Login page
	$pageStyle = "reg.css";
	$fixed_footer = true;

	//initialize the NAME of the (links) in the Nav-bar
	$navbar = array(
		'link_1' => array(
			'name' => 'Messages',
			'href' => "messages.php?id=$id"
		),
		'link_2' => array(
			'name' => 'Log Out',
			'href' => 'index.php'
		)
	);

	// check if the sender is "user" or "guest"
	if(!isset($_SESSION['name'])){
		$navbar = array(
			'link_1' => array(
				'name' => 'Home',
				'href' => 'index.php'
			),
			'link_2' => array(
				'name' => 'Reigster',
				'href' => 'register.php'
			),
			'link_3' => array(
				'name' => 'Login',
				'href' => 'login.php'
			)
		);
	}
	// check for the error massage
	if (isset($_GET['msg'])){
		$msq = $_GET['msg'];
	}


	// add the initial files (Navbar - others)
	include "ini/ini.paths.php";
 ?>
	<!-- START the send_msg Page  -->
	            </div>
	        </div>
	    </div>
	    	<?php if (isset($msq)) {
				echo '<p class="msg1" align="center">';
	    			echo $msq;
				echo '</p>';
	    	}
	    	?>
		<div class="name">
			<form action="send_msg.msg.php" method="post">
				<input type="text" name="name" placeholder="Your Friend Name">
				<input type="submit" name="submit" value="Proceed">
			</form>
		</div>
	<!-- END the send_msg Page  -->

	<!-- Add the footer of the Send_msg Page  -->
	<?php include $templates . "footer.php"; ?>
