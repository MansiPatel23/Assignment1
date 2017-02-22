<?php
$dbname = "assignment1";
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";

/*
 * This file will connect with server, and database using  username and password
 */
$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
?>