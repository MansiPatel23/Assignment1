<?php

$dbname = "assignment1";
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";

$con = mysqli_connect($dbhost, $dbuser, $dbpassword);

$query = "CREATE DATABASE IF NOT EXISTS " . $dbname;

if (mysqli_query($con, $query))
    echo "Database Created Successfully";
else
    echo "Error Creating Database: " . mysqli_error($con);

mysqli_select_db($con, $dbname);

$query = "CREATE TABLE IF NOT EXISTS registration (
		userid INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		email VARCHAR (50) NOT NULL ,
		username VARCHAR(50) NOT NULL,
		password VARCHAR(50) NOT NULL
	)";

if (mysqli_query($con, $query))
    echo "<br>User Table Created Successfully";
else
    echo "<br>Error Creating Database: " . mysqli_error($con);

$query = "CREATE TABLE IF NOT EXISTS todo (
		todoid INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		userid INT NOT NULL,
		todotask VARCHAR(255) NOT NULL
		)";

if (mysqli_query($con, $query))
    echo "<br>User Table Created Successfully";
else
    echo "<br>Error Creating Database: " . mysqli_error($con);

?>