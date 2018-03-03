<?php
    /*******************************************************************
    ** Name:         (Saraha "Register" Page)                          *
    ** Description:  This file includes the Registration Form (HTML)   *
    *                and storing this data into Database (php)         *
    ** Contains:     (Navbar - Form - footer)                          *
    ** Author:       ((AZEX Team))                                     *
    ** Date:         3 March 2018                                      *
    ********************************************************************/

    //initialize the (pageStyle) for the Register page
    $pageStyle = "reg.css";

    //initialize the NAME of the (links) in the Nav-bar
    $navbar = array(
        'link_1' => array(
            'name' => 'Home',
            'href' => 'index.php'
        ),
        'link_2' => array(
            'name' => 'Login',
            'href' => 'login.php'
        ),
        'link_3' => array(
            'name' => 'Send Msg',
            'href' => 'send_msg.php'
        )
    );

    // add the initial files (Navbar - others)
    include "ini/ini.paths.php";

    // Start the session
    if (isset($_POST['submit'])){

        // sanitize the data by Mysqli to avoid (SQL Injection)
        $name    = mysqli_real_escape_string($conn, $_POST['name']);
        $pass    = mysqli_real_escape_string($conn, $_POST['pass']);
        $cpass   = mysqli_real_escape_string($conn, $_POST['cpass']);
        $email   = mysqli_real_escape_string($conn, $_POST['email']);
        $date    = mysqli_real_escape_string($conn, $_POST['date']);
        $gender  = mysqli_real_escape_string($conn, $_POST['gender']);
        $image   = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $contury = mysqli_real_escape_string($conn, $_POST['contury']);

        // insert the (registered) user into the database (users)
        $query = "INSERT INTO `users` (name, pass, email, date, gender, contury, image) VALUES ('$name' , '$pass' ,'$email' , '$date' , '$gender' , '$contury', '$image')";
        $insert = mysqli_query($conn , $query);

        // show an error if the query didn't work out.
        if (!$insert){
            echo "Error: " . mysqli_error($inset);
        }
    }

?>

        <!-- Start the (Register) Page -->
                </div>
            </div>
        </div>

        <!--******************************
        *********************************
            2. Registeration Form      *
        *********************************
        **********************************-->
        <div class="register">
            <h2>Register</h2>
            <form action="register.php" method="post" enctype="multipart/form-data">
                <div class="holder">
                    <label>Username</label>
                    <input type="text" name="name">
                </div>
                <div class="holder">
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div class="holder">
                    <label>Password</label>
                    <input type="password" name="pass">
                </div>
                <div class="holder">
                    <label>Password Confirmation</label>
                    <input type="password" name="cpass">
                </div>
                <div class="holder">
                    <label>Birth date</label>
                    <input type="date" name="date">
                </div>
                <div class="holder">
                    <label>Your Image</label>
                    <input type="file" name="image">
                </div>
                <div class="holder">
                    <label>Gender</label>
                    <select name="gender">
                        <option value="-" selected>-</option>
                        <option value="Male" >Male</option>
                        <option value="Female" >Female</option>
                    </select>
                </div>
                <div class="holder">
                    <label>Country</label>
                    <select name="contury">
                        <option value="Egypt">Egypt</option>
                        <option value="US">US</option>
                        <option value="UK">UK</option>
                        <option value="Japan">Japan</option>
                        <option value="china">china</option>
                    </select>
                </div>
                <div class="holder">
                    <input type="submit" name="submit" value="Register">
                </div>
            </form>
        </div>
        <!-- End the (Register) Page -->

        <!-- Add the footer for the page -->
        <?php include $templates . "footer.php"; ?>
