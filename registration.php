<?php
session_start();
include("dbconnection.php");

if (isset($_POST['signup'])) {
    $email=$_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($email == "")
        echo "Please Enter Email";
    elseif ($username == "")
        echo "Please Enter Name";
    elseif ($password == "")
        echo "Please Enter Password";
    else {
        // Insert query will allow to new user registration and save data in 'registration' table
        $query = "INSERT INTO registration (email,username, password)
			VALUES ('$email','$username', '$password')";

        if (mysqli_query($con, $query)) {
            echo "Registerd successfully";
            echo "<script>window.open('login.php','_self')</script>";
        }
    else
            echo "Error : " . mysqli_error($con);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body>
<form id="form1" name="form1" method="post" action="registration.php">
    <table border="1px" align="center">
        <caption>
            <h2>Registration</h2>
        </caption>
        <tr>
            <td>Email</td>
            <td><input type="email" name="email" id="email"/></td>
        </tr>
        <tr>
            <td>User Name</td>
            <td><input type="text" name="username" id="username"/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password"/></td>
        </tr>
        <tr>
            <td colspan="2">
                <div align="center">
                    <input type="submit" name="signup" id="button" value="Sign Up"  />
                </div>
            </td>
        </tr>
    </table>
</form>
</body>
</html>