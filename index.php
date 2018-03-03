<?php
    /************************************************************
    ** Name:         (Saraha Welcome Page)                      *
    ** Description:  This file shows the interface of the       *
    *                welcome page of saraha.                    *
    ** Contains:     (Navbar - core - footer)                   *
    ** Author:       ((AZEX Team))                              *
    ** Date:         3 March 2018                               *
    *************************************************************/
    //initialize the (pageStyle) for the welcome page
    $pageStyle = "style1.css";

    //initialize the NAME of the (links) in the Nav-bar
    $navbar = array(
        'link_1' => array(
            'name' => 'Register',
            'href' => 'register.php'
        ),
        'link_2' => array(
            'name' => 'Login',
            'href' => 'login.php'
        ),
        'link_3' => array(
            'name' => 'Send Msg',
            'href' => 'send_msg.person.php'
        )
    );

    // add the initial files (Navbar - others)
    include "ini/ini.paths.php";

    // destroy the session, if he (logs out)
    session_unset();
    session_destroy();
    ?>

    <!-- Start the Core page  -->
                <div class="clear"></div>
                <div class="core">
                    <p>Ask . . <span class="blue">To</span> know</p>
                </div>
                <a href="register.php"><button>Register Now</button></a>
                </div>
            </div>
        </div>
    <!-- End the core page -->

    <!-- Add the footer -->
    <?php include $templates . "footer.php"; ?>
