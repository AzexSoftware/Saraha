<?php
    /*******************************************************************
    ** Name:         (Saraha "Messages" Page)                          *
    ** Description:  This file includes the messages of the user       *
    ** Contains:     (Navbar - image - messages - footer)              *
    ** Author:       ((AZEX Team))                                     *
    ** Date:         3 March 2018                                      *
    ********************************************************************/
    //initialize the (pageStyle) for the (Messages) page
    $pageStyle  = "msg.css";

    //initialize the NAME of the (links) in the Nav-bar
    $navbar = array(
        'link_1' => array(
            'name' => 'Send Messages',
            'href' => 'send_msg.person.php'
        ),
        'link_2' => array(
            'name' => 'Log Out',
            'href' => 'index.php'
        )
    );

    // add the initial files (Navbar - others)
    include "ini/ini.paths.php";

    // Start the session, and Get the ID of the user to show his messages
    $id = $_GET['id'];
    $_SESSION['user_id'] = $id;

	// Select all the message for the use having this (ID)
    $query = "SELECT * FROM `message` WHERE id = '$id' ORDER BY idone DESC";
	$result = mysqli_query($conn , $query);
	$cuonter = mysqli_num_rows($result);

    //
    $query1 = "SELECT * FROM `users` WHERE id = '$id'";
    $result1 = mysqli_query($conn , $query1);
    $row1 = mysqli_fetch_array($result1);

	$var = "messages.php?id=" . $id;
	$var2 = "Saraha-War/messages.php/" . $_SESSION['name'];
?>
	<!-- Start The Messages Page  -->
				</div>
			</div>
		</div>
		<div class="body">
            <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($row1['image']) . '" height="100" width="100" />'; ?>
			<h3 class="inf username"><?php echo ucfirst($_SESSION['name']); ?></h3>
			<p class="inf"> <span class="msg_para">Masseges: </span><span class="num-msg"><?php echo $cuonter; ?></span></p>
			<a href= "<?php echo $var ?>" class="web"><?php echo $var2 ?></a>
		</div>
		<div class="body1">
			<h3>Your Masseges</h3>
			<ul class="main2">
				<li><a href="" class="sec">Received</a></li>
				<li><a href="" class="sec">Favorites</a></li>
				<li><a href="" class="sec">Sent</a></li>
			</ul>
            <br>
			<!-- Show the nth of messages  -->
            <?php if($cuonter > 0): ?>
    			<?php foreach ($result as $row): ?>
                    <div class="user-msg">
        				<h4><span class="p"><?php echo formatDate($row['time']); ?></span> : <?php echo $row['message']; ?></h4>
        				<p class="x">&times;</p>

        				<?php if($row['sender'] != 0) :?>
        					<form action="replay.php" method="post">
        						<textarea placeholder="Your Replay ... " name="Replay" class="replay"></textarea>
        						<input type="hidden" name="hidden" value="<?php echo $id; ?>">
        						<input type="hidden" name="hiddenm" value="<?php echo  $row['idone'];  ?>">
        						<input type="submit" name="submit" value="Send">
        					 </form>
        				<?php endif; ?>
                    </div>
    			<?php endforeach;  ?>
            <?php else: ?>
                <div class="user-msg">
                    <h4 align="center">You haven't received any messages yet!</h4>
                    <br>
                </div>
            <?php endif; ?>
		</div>
	</div>
	<!-- End The Messages Page  -->

	<!-- Add the footer of the page -->
	<?php include $templates . "footer.php"; ?>
