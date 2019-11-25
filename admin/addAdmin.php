<?php
include 'inc/admin.php';
include '../inc/fonctionC.php';
if (isset($_POST["login"])and isset($_POST["email"]) and isset($_POST["lpass"]) and isset($_POST["name"]))
{
    $a=new admin(($_POST["login"]),($_POST["name"]) ,($_POST["email"]) ,($_POST["lpass"]));
    $ac=new fonctionC();
    $ac->addAdmin($a);
    header('location:admins.php');
}
else
{
    echo 'thabet rou7ek ';
}