<?php
require_once __DIR__ . '/config/db.php';
$db = new config\Connect();

$id_user = $_GET['id'];
$user = $db->getUserById($id_user);
?>

<p>Name = <?= $user['name']; ?></p>
<p>Surname = <?= $user['surname']; ?></p>
<p>Email = <?= $user['email']; ?></p>
<p>Age = <?= $user['age']; ?></p>


<hr>
<a href="index.php">|Home | </a>
<a href="add.php"> Add User | </a>
<a href="show_users.php"> Show users|</a>
<a href="delete.php"> Delete user|</a>
