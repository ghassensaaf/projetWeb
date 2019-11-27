<?php
session_start ();
unset($_SESSION['uname']);
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['phone']);
header ('location:index.php');
?>
