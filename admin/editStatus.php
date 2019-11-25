<?php
include "../inc/fonctionC.php";
if(isset($_POST["login"])and isset($_POST['status']))
{
    $f=new fonctionC();
    $f->editStatus(($_POST["login"]),($_POST['status']));
    header("location:admins.php");

}