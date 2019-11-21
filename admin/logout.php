<?php
session_start ();
session_unset ($_SESSION["role"]);

header ('location:../index.php');
?>
