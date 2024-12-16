<?php
require_once('../functions.php');
session_start();
unset($_SESSION['user_name']);
debug($_SESSION);


header('Location: ../index.php?page=home');
exit;

?>