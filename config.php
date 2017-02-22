<?php

$dbname = "assignment1"; //database name
$dbhost = "localhost";  //host name
$dbuser = "root";       //user name of phpMyadmin
$dbpassword = "";       //password


$con = mysqli_connect($dbhost, $dbuser, $dbpassword);   //This will connect to server and create a new database

$query = "CREATE DATABASE IF NOT EXISTS " . $dbname;

if (mysqli_query($con, $query))
    echo "Database Created Successfully";
else
    echo "Error Creating Database: " . mysqli_error($con);

mysqli_select_db($con, $dbname);            // This will connect with database and create tables "registration' and 'todo'


/* registration table */
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


/* todo table */
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