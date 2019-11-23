<?php
include 'inc/user.php';
include 'inc/fonctionC.php';
if (isset($_POST['address-name']) and isset($_POST['name']) and isset($_POST['street']) and isset($_POST['city']) and isset($_POST['state']) and isset($_POST['zip']) and isset($_POST['phone']) and isset($_POST['add_id']))
{

    $f=new fonctionC();
    $f->editAdd($_POST['add_id'],$_POST['address-name'],$_POST['name'],$_POST['street'],$_POST['city'],$_POST['state'],$_POST['zip'],$_POST['phone']);
    header('location:adresses.php');
}
else
{
    echo "some error adding this shit";
}