<?php
include '../inc/fonctionC.php';
if (isset($_POST["uname"]))
{
    $u=new fonctionC();
    $u->deleteUser($_POST["uname"]);
    header("location:users.php");
}
