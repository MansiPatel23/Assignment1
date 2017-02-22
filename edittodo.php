<?php
session_start();
include("dbconnection.php");        // connection with database and server

$userid = $_SESSION["userid"];
$todoid = $_GET['todoid'];
$username = $_SESSION["username"];

/* this query will select data from 'todo' table and match userid and todoid */

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

        /* UPDATE query will edit todo task in table */
        $query = "UPDATE todo SET todotask = '$todotask'
			WHERE userid = '$userid' AND todoid = '$todoid'";

        if (mysqli_query($con, $query))
            echo "Edited successfully<br><br>";
        else
            echo "Error : " . mysqli_error($con);
    }
}
// DELETE query will check the userid and todoid, if data will match then it will delete record of todo task from table
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
    <title>Edit todo list</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
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