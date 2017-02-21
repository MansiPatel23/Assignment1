<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>To do</title>
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" />
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div class="list">
        <h1 class="header">To do.</h1>
        <ul class="items">
            <li>
                <span class="item"><input type="checkbox" name="todo" value="todo">Pick up shopping</span>
                <input type="submit" value="Edit" class="edit">
            </li>
            <li>
                <span class="item"> <input type="checkbox" name="todo" value="todo">Learn php</span>
                <input type="submit" value="Edit" class="edit">
            </li>
        </ul>

        <form class="item-add" action="addtodo.php" method="post">
            <input type="text" name="name" placeholder="Type a new item here." class="input" autocomplete="off">
            <input type="submit" value="Add" class="submit">
        </form>
    </div>
</body>
</html>