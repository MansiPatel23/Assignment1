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
        $query = "INSERT INTO registration (email,username, password)
			VALUES ('$email','$username', '$password')";

        if (mysqli_query($con, $query))
            echo "Registerd successfully";
        else
            echo "Error : " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="">
    <input name="email" type="text" placeholder="Email">
    <input name="username" type="text" placeholder="Userame">
    <input name="password" type="password" placeholder="Password">
    <input name="signup" type="submit" value="Sign Up">
    <a href="login.php">Log In</a>
</form>
</body>
</html>