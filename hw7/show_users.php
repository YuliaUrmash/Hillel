<?php
require_once __DIR__ . '/config/db.php';
$db = new config\Connect();

$users = $db->getAllUsers();
?>
<?php if (!empty($users)): ?>
    <?php foreach ($users as $user): ?>
        <a href="users.php?id=<?= $user['id'] ?>">ID = <?= $user['id'] ?> </a><br>
    <?php endforeach; ?>
<?php else: ?>
    <p>No users</p>
<?php endif; ?>

<hr>
<a href="index.php">|Home| </a>
<a href="add.php">Add User | </a>
<a href="show_users.php">Show users|</a>
<a href="delete.php">Delete user|</a>

