<?php
session_start ();
unset ($_SESSION["role"]);
unset ($_SESSION["status"]);
unset ($_SESSION['login']);
unset ($_SESSION['mail']);

header ('location:../index.php');
?>
