<?php
include '../inc/fonctionC.php';
echo $_POST['pwd'];
if (isset($_POST['uname']) and isset($_POST['name']) and isset($_POST['email']) and isset($_POST['phone']))
{
    $u= new fonctionC();

    if (isset($_POST['pwd']))
    {

        $u->editUser(($_POST['uname']) ,($_POST['name']) ,($_POST['email']) ,($_POST['phone']),($_POST['pwd']));
        header('location:../index.php');
    }
    else
    {
        $u->editUser(($_POST['uname']) ,($_POST['name']) ,($_POST['email']) ,($_POST['phone']));
        header('location:users.php');
    }

}
else
{
    echo "salem thabet rou7ek";
}

