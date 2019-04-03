<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection(); ?>
<?php
unset($_SESSION['username']);
session_destroy();

header("Location: login.php");
exit;
?>
