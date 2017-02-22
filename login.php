<?php
session_start();
include("dbconnection.php");

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "")
        echo "Please Enter Name";
    elseif ($password == "")
        echo "Please Enter Password";
    else {

        // Query will match the user input data with table data, if it will match it allow to Login otherwise it will show error
        $query = "SELECT * FROM registration
			WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            $row =  mysqli_fetch_assoc($result);
            $_SESSION["userid"] = $row["userid"];
            $_SESSION["username"] = $row["username"];
            header("Location: todo.php");
        }
        else
            echo "Error!";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
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