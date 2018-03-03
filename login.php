<?php
    /*******************************************************************
    ** Name:         (Saraha "Login" Page)                             *
    ** Description:  This file includes the Login Form (HTML)          *
    *                and Checking the user data into Database (php)    *
    *                to show the his messages or not ()                *
    ** Contains:     (Navbar - Form - footer)                          *
    ** Author:       ((AZEX Team))                                     *
    ** Date:         3 March 2018                                      *
    ********************************************************************/

    //initialize the (pageStyle) for the Login page
    $pageStyle = "login.css";

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
            'name' => 'Send Msg',
            'href' => 'send_msg.php'
        )
    );

    // add the initial files (Navbar - others)
    include "ini/ini.paths.php";

    // if The login button is pressed, Do the following:
    if(isset($_POST['login'])){
        // take the the data (username, password) From (login) form
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        // Check if the user exist in the database
        $query = "SELECT * FROM `users` WHERE name = '$name' AND pass = '$pass'";
        $result = mysqli_query($conn , $query);

        // if the user exists, Do the following:
        if (mysqli_num_rows($result) > 0){
            // Store his name to use it, through his pages (message page, . . .)
            $_SESSION['name'] = $name;

            // Store his Id, to show his messages
            $strResult = mysqli_fetch_assoc($result);
            $id = $strResult['id'];

            // Go to his (Messages) Page, Using his ID
            header("location: messages.php?id=" . $id);
            exit();
        } else {
            // if the user doesn't exist, then go to (Login) Page
            header("location: login.php");
            exit();
        }
    }
?>
    <!-- Start the login Page  -->
                </div>
            </div>
        </div>

        <!--******************************
        *********************************
            2. Registeration Form      *
        *********************************
        **********************************-->
        <div class="login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="holder">
                    <input type="text" name="name" placeholder="type name ... ">
                </div>
                <div class="holder">
                    <input type="password" name="pass" placeholder="type password ..."> <br>
                </div>
                <div class="holder">
                    <input type="checkbox" value="remeber">Remeber Password
                </div>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
        <!-- Start the login Page  -->

        <!-- Add the footer  -->
        <?php include $templates . "footer.php"; ?>
