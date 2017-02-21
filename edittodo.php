<?php
session_start();
include("dbconnection.php");

$userid = $_SESSION["userid"];
$todoid = $_GET['todoid'];
$username = $_SESSION["username"];

$query = "SELECT * FROM todo 
	WHERE userid = '$userid' AND todoid = '$todoid'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0)
    $row =  mysqli_fetch_assoc($result);
else
    echo "Error!";

if (isset($_POST['edit'])) {
    $todotask = $_POST['todotask'];

    if ($todotask == "")
        echo "Please Enter Todo";
    else {
        $query = "UPDATE todo SET todotask = '$todotask'
			WHERE userid = '$userid' AND todoid = '$todoid'";

        if (mysqli_query($con, $query))
            echo "Edited successfully<br><br>";
        else
            echo "Error : " . mysqli_error($con);
    }
}

if (isset($_POST['delete'])) {
    $query = "DELETE FROM todo
		WHERE userid = '$userid' AND todoid = '$todoid'";

    if (mysqli_query($con, $query))
        header("Location: todo.php");
    else
        echo "Error : " . mysqli_error($con);
}


?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<a href="todo.php">Todo</a>
<form method="POST" action="">
    <input name="todotask" type="text" value="<?php echo $row['todotask']; ?>">
    <input name="edit" type="submit" value="Edit">
</form>
<form method="POST" action="">
    <input name="delete" type="submit" value="Delete">
</form>
</body>
</html>