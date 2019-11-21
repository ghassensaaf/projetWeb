<?php
if (isset($_POST['email']))
{

}
else
{
    include "inc/fonctionC.php";
}

if(isset($_POST['luser']) and isset($_POST['lpass']))
{
    $uname=$_POST['luser'];
    $upass=$_POST['lpass'];
    $use=new fonctionC();
    $u=$use->Logedin($uname,$upass);
    $lgdin=false;
    if(!empty($uname)&&!empty($upass))
    {
        foreach ($u as $t)
        {
            $lgdin=true;
            if(($t['u_uname']===$uname) &&(($t['u_pwd']===MD5($upass))))
            {

                session_start();
                $_SESSION['uname']=$t["u_uname"];
                $_SESSION['name']=$t["u_name"];
                $_SESSION['email']=$t["u_email"];
                $_SESSION['phone']=$t["u_phone"];
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