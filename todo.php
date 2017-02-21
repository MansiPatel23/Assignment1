<?php
session_start();
include("dbconnection.php");

$userid = $_SESSION["userid"];
$username = $_SESSION["username"];

if (isset($_POST['add'])) {

    $todotask = $_POST['todotask'];

    if ($todotask == "")
        echo "Please Enter Todo Task";
    else {
        $query = "INSERT INTO todo (todotask, userid)
			VALUES ('$todotask', '$userid')";

        if (mysqli_query($con, $query))
            echo "Added successfully<br><br>";
        else
            echo "Error : " . mysqli_error($con);
    }

}

$query = "SELECT * FROM todo WHERE userid = '$userid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo $row["todotask"] . " ";
        $todoid = $row["todoid"];
        echo "<a href='edittodo.php?todoid=$todoid'>edit</a><br>";
    }
} else {
    echo "You haven't added any items, yet.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="">
    <input name="todotask" type="text" placeholder="Add todo">
    <input name="add" type="submit" value="Add">
</form>
</body>
</html>