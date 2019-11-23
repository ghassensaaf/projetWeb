<?php
include 'inc/user.php';
include 'inc/fonctionC.php';

if (isset($_POST['luser']) and isset($_POST['name']) and isset($_POST['email']) and isset($_POST['lpass']) and isset($_POST['phone']))
{
    $user=new user($_POST['luser'],$_POST['name'],$_POST['email'],$_POST['lpass'],$_POST['phone']);
    $fonctionC= new fonctionC();
    $req=$fonctionC->addUser($user);
    if($_POST['role']=="admin")
    {
        header("location:admin/users.php");
        die();
    }

    include 'auth.php';
}
else
{
    $error="User bla bla bla";
}

?>