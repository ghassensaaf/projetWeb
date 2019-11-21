<?php

include "../inc/fonctionC.php";


if(isset($_POST['login']) and isset($_POST['pwd']))
{
    $uname=$_POST['login'];
    $upass=$_POST['pwd'];
    $use=new fonctionC();
    $u=$use->adminLogIn($uname,$upass);
    $lgdin=false;
    if(!empty($uname)&&!empty($upass))
    {
        foreach ($u as $t)
        {
            $lgdin=true;
            if(($t['login']===$uname) &&(($t['pwd']===md5($upass))))
            {

                session_start();
                $_SESSION['login']=$t["login"];
                $_SESSION['mail']=$t["email"];
                $_SESSION['role']="admin";
                header('location:index.php');

            }
        }
    }
    if($lgdin==false)
    {
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        // puis on le redirige vers la page d'accueil
        echo '<meta http-equiv="refresh" content="0;URL=login.php">';
    }


}
else
{
    echo 'bnuit';
}
?>