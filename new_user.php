<?php
include 'inc/user.php';
include 'inc/userC.php';

if (isset($_POST['uname']) and isset($_POST['name']) and isset($_POST['email']) and isset($_POST['pwd']) and isset($_POST['phone']))
{
    $user=new user($_POST['uname'],$_POST['name'],$_POST['email'],$_POST['pwd'],$_POST['phone']);
    $userC= new userC();
    $req=$userC->addUser($user);

}
else
{
    $error="User bla bla bla";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header id="header" class="border-bottom border-secondary">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <h1><a href="index.php" >Electro Zarrouk</a></h1>
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu">
                <li class=""><a href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Smartphones
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Apple</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Samsung</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">huawei</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Show all</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Audio
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Headphones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Earphones</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Speakers</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Show all</a>
                    </div>
                </li>

                <li><a href="login.php"><i class="fas fa-user"></i> <span class="vis-toggle">Login/Signup</span></a></li>
                <li><a href=""><i class="fas fa-shopping-basket"></i><span class="vis-toggle">My Shopping bag</span></a></li>
            </ul>
        </nav>
    </div>
</header>
<main>
    <div class="login-wrap">
        <div class="login-html">
            <?php
            if ($req === TRUE)
                {
                    echo"    
                        <h3 style='color: white;'> Welcome , <?php echo $user->uname ?> to our website</h3>
                        <p style='color: white;'> vous allez etre redirigé vers la page d'acceuil dans 5 sec,</p>
                        <p style='color: white;'> si vous etes pas rediriger veuillez clicker <a href=\"index.php\">içi</a> </p>
                        ";
                    echo "<script>setTimeout(\"location.href = 'index.php';\",5000);</script>";
                }
            else if($req === "Erreur: 23000")
                {
                    echo " <p style='color:#fff;'> Error: le nom d'utilisateur ou  l'e-mail sont deja utilisé,</p> ";
                    echo "<script>setTimeout(\"location.href = 'login.php';\",5000);</script>";
                }
            ?>

        </div>
    </div>



</main>
<!-- Footer -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>Electro Zarrouk</h3>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-contact">
                    <h4>Contact Us</h4>
                    <p>
                        24 El Bahja Street <br>
                        Hammamet, Nabeul 8050<br>
                        Tunisia <br>
                        <strong>Phone:</strong> +216 22 222 222<br>
                        <strong>Email:</strong> info@example.com<br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="fab fa-google-plus"></i></a>
                        <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
                    </div>

                </div>



            </div>
        </div>
    </div>

</footer>
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
<script src="lib/fontawesome/js/fawesome.js"></script>
<!-- Main Javascript File -->
<script src="js/main.js"></script>
</body>
</html>
