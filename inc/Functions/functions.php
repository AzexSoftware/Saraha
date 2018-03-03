<?php


    /*
    **  Format the date to a beautiful shape
    */
    function formatDate($date){
        return date("F j, Y, g:i a" ,strtotime($date));
    }
