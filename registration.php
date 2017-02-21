<?php

    $con=mysqli_connect("localhost","root","","assignment1");
    if(mysqli_connect_errno())
    {
        echo "No Active Database please check :" .mysqli_connect_error();
    }
    /* if(!$con)
    {
        die("Database connection failed:".mysqli_error());
    }*/
   // mysqli_select_db($con,'assignment1')or die(mysqli_error());
   // $db=mysqli_select_db($con,'assignment1')or die(mysqli_error());
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];


        if($email=='')
        {
            echo "<script>alert('Enter Your Email');</script>";
        }
        if($username=='')
        {
            echo "<script>alert('Enter Your User Name');</script>";
        }
        if($password=='')
        {
            echo "<script>alert('Enter Your Password');</script>";
        }
        else
        {
            $query="insert into registration(email,username,password) values ('$email','$username','$password')";
            if (mysqli_query($con, $query))
            {
                echo "<script>alert('You are Successfully Registered');</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="style.css" type="text/css">
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
                        <input type="submit" name="submit" id="button" value="submit" />
                    </div>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>