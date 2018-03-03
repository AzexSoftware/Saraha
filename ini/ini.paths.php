<?php
    /************************************************************
    ** Name:         ini.paths.php                              *
    ** Description:  This file made to be included in each      *
    *               file of the project.                        *
    ** Contains:     The paths of each of the following:        *
    *                   - database                              *
    *                   - css layouts                           *
    *                   - header (HTML)                         *
    *                   - Functinos                             *
    ** Author:       ((AZEX Team))                              *
    ** Date:         3 March 2018                               *
    *************************************************************/

    /* *************************
    **  The paths of each file
    ** ************************/
    $css        = "layouts/css/";
    $database   = "ini/";
    $functions  = "inc/Functions/";
    $templates  = "inc/Templates/";
    $images     = "images/";

    /* *****************************************
    **  Including the initial files of each page
    ** *****************************************/
    include $database . "database.php";
    include $functions . "functions.php";
    include $templates . "header.php";

    // Start the session in all pages
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
