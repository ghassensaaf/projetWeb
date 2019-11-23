<?php
include 'inc/fonctionC.php';
if (isset($_POST['add_id']))
{
    $f=new fonctionC();
    $f->deleteAdd($_POST['add_id']);
    header('location:adresses.php');
}