
<?php session_start();?>
<?php
$_SESSION['username'] = NULL;
$_SESSION['firstname'] = NULL;
$_SESSION['lastname'] = NULL;
$_SESSION['role'] = NULL;
$_SESSION['user_id'] = NULL;

header("Location: ../index.php");


?>