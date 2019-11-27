<?php
include '../inc/user.php';
include 'inc/admin.php';
include 'inc/tech.php';
include '../inc/fonctionC.php';
if($_POST["form"]=="addAdmin")
{
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
}
else if ($_POST['form']=='adminAuth')
{
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

                if(($t['login']===$uname) &&($t['pwd']===md5($upass))&&($t['status']>0))
                {
                    session_start();
                    $_SESSION['login']=$t["login"];
                    $_SESSION['mail']=$t["email"];
                    $_SESSION['role']="admin";
                    if(($t['status']>1))
                    {
                        $_SESSION['status']="55";
                    }
                    else
                    {
                        $_SESSION['status']="1";
                    }

                    header('location:index.php');
                }
                else if (($t['login']===$uname) &&($t['pwd']===md5($upass))&&($t['status']==0))
                {
                    echo '<!doctype html> <!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]--> <!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]--> <!--[if IE 8]> <html class="no-js lt-ie9" lang=""> <![endif]--> <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]--> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <title>Ela Admin - HTML5 Admin Template</title> <meta name="description" content="Ela Admin - HTML5 Admin Template"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png"> <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css"> <link rel="stylesheet" href="assets/css/cs-skin-elastic.css"> <link rel="stylesheet" href="assets/css/style.css"> <link href=\'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800\' rel=\'stylesheet\' type=\'text/css\'> <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> --> </head> <body class="bg-dark"> <div class="sufee-login d-flex align-content-center flex-wrap"> <div class="container"> <div class="login-content"> <div class="login-logo"> </div> <div class="login-form"> <p>Your account is suspended back to <a href="../index.php">home</a></p> </div> </div> </div> </div> <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script> <script src="assets/js/main.js"></script> </body> </html> ';
                }

            }
        }
        if($lgdin==false)
        {
            echo '<!doctype html> <!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]--> <!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]--> <!--[if IE 8]> <html class="no-js lt-ie9" lang=""> <![endif]--> <!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]--> <head> <meta charset="utf-8"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <title>Ela Admin - HTML5 Admin Template</title> <meta name="description" content="Ela Admin - HTML5 Admin Template"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png"> <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css"> <link rel="stylesheet" href="assets/css/cs-skin-elastic.css"> <link rel="stylesheet" href="assets/css/style.css"> <link href=\'https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800\' rel=\'stylesheet\' type=\'text/css\'> <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> --> </head> <body class="bg-dark"> <div class="sufee-login d-flex align-content-center flex-wrap"> <div class="container"> <div class="login-content"> <div class="login-logo"> </div> <div class="login-form"> <p>cannot find Login password combination back to <a href="../index.php">home</a></p> </div> </div> </div> </div> <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script> <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script></body> </html> ';

        }


    }
    else
    {
        echo 'bnuit';
    }
}

else if($_POST["form"]=="deleteUser")
{
    if (isset($_POST["uname"]))
    {
        $u=new fonctionC();
        $u->deleteUser($_POST["uname"]);
        header("location:users.php");
    }
}
else if($_POST["form"]=="editAdmin")
{
    if(isset($_POST['name'])and isset($_POST['email']) and isset($_POST['login']))
    {
        $f=new fonctionC();
        $f->editAdmin($_POST['login'],$_POST['name'],$_POST['email']);
        header('location:admins.php');
    }
}
else if($_POST["form"]=="editStatus")
{
    if(isset($_POST["login"])and isset($_POST['status']))
    {
        $f=new fonctionC();
        $f->editStatus(($_POST["login"]),($_POST['status']));
        header("location:admins.php");

    }
}
else if($_POST["form"]=="editUser")
{
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
}
else if ($_POST["form"]=="addAdd")
{
    if (isset($_POST['address-name']) and isset($_POST['name']) and isset($_POST['street']) and isset($_POST['city']) and isset($_POST['state']) and isset($_POST['zip']) and isset($_POST['phone']) and isset($_POST['uname']))
    {
        $add=new address($_POST['uname'],$_POST['address-name'],$_POST['name'],$_POST['street'],$_POST['city'],$_POST['zip'],$_POST['state'],'Tunisia',$_POST['phone']);
        $f=new fonctionC();
        $f->addAddress($add);
        header('location:../adresses.php');
    }
    else
    {
        echo "some error adding this shit";
    }
}
else if ($_POST["form"]=="deleteAdd")
{
    if (isset($_POST['add_id']))
    {
        $f=new fonctionC();
        $f->deleteAdd($_POST['add_id']);
        header('location:../adresses.php');
    }
}
else if ($_POST["form"]=="editAdd")
{
    if (isset($_POST['address-name']) and isset($_POST['name']) and isset($_POST['street']) and isset($_POST['city']) and isset($_POST['state']) and isset($_POST['zip']) and isset($_POST['phone']) and isset($_POST['add_id']))
    {

        $f=new fonctionC();
        $f->editAdd($_POST['add_id'],$_POST['address-name'],$_POST['name'],$_POST['street'],$_POST['city'],$_POST['state'],$_POST['zip'],$_POST['phone']);
        header('location:../adresses.php');
    }
    else
    {
        echo "some error adding this shit";
    }
}
else if ($_POST["form"]=="addTech")
{
    if(isset($_POST["login"]) and isset($_POST["name"])and isset($_POST["email"])and isset($_POST["pwd"]))
    {
        $t=new tech($_POST["login"],$_POST["pwd"],$_POST["email"],$_POST["name"]);
        $f=new fonctionC();
        $f->addTech($t);
        header('location:techs.php');

    }
}
else if($_POST["form"]=="editTech")
{
    if(isset($_POST['name'])and isset($_POST['email']) and isset($_POST['login']))
    {
        $f=new fonctionC();
        $f->editTech($_POST['login'],$_POST['name'],$_POST['email']);
        header('location:techs.php');
    }
}
else if($_POST["form"]=="deleteTech")
{
    if (isset($_POST["login"]))
    {
        $u=new fonctionC();
        $u->deleteTech($_POST["login"]);
        header("location:techs.php");
    }
    else
    {
        echo "ccacac";
    }
}
else if($_POST["form"]=="addCart")
{
    if (isset($_POST["pId"]))
    {
        $u=new fonctionC();
        $u->ajouterPanier($_POST["pId"]);
        header("location:../products.php"); 
    }
    else
    {
        echo "ccacac";
    }
}
