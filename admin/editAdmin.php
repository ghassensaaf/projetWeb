<?php
include "../inc/fonctionC.php";
if(isset($_POST['name'])and isset($_POST['email']) and isset($_POST['login']))
{
    $f=new fonctionC();
    $f->editAdmin($_POST['login'],$_POST['name'],$_POST['email']);
    header('location:admins.php');
}