<?php
    $conn = mysqli_connect("localhost" , "root" , "" , "sarraha");
    if (!$conn){
        die("Error: " . mysqli_error_connect());
    }
