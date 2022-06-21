<?php
require_once __DIR__ . '/config/db.php';
$db = new config\Connect();
$isTable = $db->tableExists('user');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['newTable'] == 1) {
    $db->createTable('user');
    header('Location:index.php');
}
?>
<?php if ($isTable === false): ?>
    <form method="POST">
        <button type="submit" value="1" name="newTable">Create table</button>
    </form>
<?php else: ?>
    <p>Table 'Users' is already exists</p>
<?php endif; ?>

<hr>
<a href="index.php">|Main| </a>
<a href="add.php">Add User| </a>
<a href="show_users.php">Show all users|</a>
<a href="delete.php">Delete user|</a>

