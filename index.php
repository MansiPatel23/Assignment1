<?php

$con=mysqli_connect("localhost","root","","assignment1");
if(mysqli_connect_errno())
{
    echo "No Active Database please check :" .mysqli_connect_error();
}

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];

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
        $query="SELECT * FROM `registration` WHERE username='$username' AND password='$password'";
        $run=(mysqli_query($con, $query)) or die(mysqli_error());
        if(mysqli_num_rows($run)>0)
        {
            echo "<script>window.open('todo.php','_self')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<form id="form1" name="form1" method="post" action="todo.php">
    <table border="1px" align="center">
        <caption>
            <h2>Login</h2>
        </caption>
        <tr>
            <td>User Name</td>
            <td><input type="text" name="username" id="username"/></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" name="password" id="password"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <div align="center">
                    <input type="submit" name="login" id="button" value="login" />
                </div>
                <a href="registration.php">Sign up</a>
            </td>
        </tr>
    </table>
</form>
</body>
</html>