<?php
require_once __DIR__ . '/config/db.php';
$db = new config\Connect();

$users = $db->getAllUsers();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usersToDelete = array();

    foreach ($_POST['delete_row'] as $selected) {
        $usersToDelete[] = $selected;
    }

    $db->deleteUser($usersToDelete);
    header("Location:index.php");
}
?>
<table class="tbl">
    <tbody>
    <?php if(!empty($users)):?>
    <form method="post">
        <?php foreach ($users as $user):?>
            <tr>
                <td> <?= $user['name']?></td>
                <td><input type='checkbox' name='delete_row[]' value="<?= $user['id']?>"></td>
            </tr>
            <br>
        <?php endforeach;?>
    </tbody>
</table>
<input type='submit' value='Delete'>
    </form>
<?php else:?>
    <p>No users</p>
<?php endif;?>

<hr>
<a href="index.php">|Main | </a>
<a href="add.php">Add User | </a>
<a href="show_users.php">Show users|</a>
<a href="delete.php">Delete user|</a>

