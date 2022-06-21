<?php
require_once __DIR__. '/config/db.php';
$db = new config\Connect();

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 1){
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $age = (int)trim($_POST['age']);
    $email = trim($_POST['email']);

    $db->addUser($name, $surname, $age, $email);
    header('Location:index.php');
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="surname" placeholder="Surname"><br>
    <input type="text" name="age" placeholder="Age"><br>
    <input type="text" name="email" placeholder="Email"><br>
    <button type="submit" name="submit" value="1">Send</button>
</form>

<hr>
<a href="index.php">|Home| </a>
<a href="add.php">Add User| </a>
<a href="show_users.php">Show users|</a>
<a href="delete.php">Delete user|</a>


