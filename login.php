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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <form method="POST" action="">
        <input name="username" type="text" placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <input name="login" type="submit" value="Log In">
        <a href="registration.php">Sign Up!</a>
    </form>
</body>
</html>