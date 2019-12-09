<?php
include 'inc/fonctionC.php';
$i= new fonctionC();
$c=$i->getCart(getHostByName(getHostName()));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Archi Mammou | Decoration Murale 3D</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="img/favicon.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=McLaren&display=swap" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<!--    <link href="admin/assets/css/style.css" rel="stylesheet">-->
    <link href="css/steel.css" rel="stylesheet">

</head>
<body>
<header id="header" class="border-bottom border-secondary">
    <div class="container-fluid">

        <div id="logo" class="pull-left">
            <img width="40px" style="margin-bottom: 15px; margin-right: 5px;" src="img/logo.png">
            <h1 id="brand" style="display: inline-block;"><a href="index.php" ><span style="color: #4A8239;">archi</span> mamm<span style="color: #4A8239; font-size: 42px;">o</span>u</a></h1>
        </div>

        <nav id="nav-menu-container">

            <ul class="nav-menu">
                <li>
                    <form class="form-inline my-2 my-lg-0" method="get" action="products.php">
                        <div class="nav-item search-box">
                            <input class="search-f mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                            <span><button type="submit" class=" search-b btn btn-light"><i class="fa fa-search"></i></button></span>
                        </div>
                    </form>
                </li>
                <li class=""><a href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Inner Wall </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Outer Wall</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Bedhead</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="products.php">Show all</a>
                    </div>
                </li>
                <li class=""><a href="index.php">Q/A</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i class="fas fa-user"></i> <span class="vis-toggle">My account</span></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="account.php">My Account</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="adresses.php">My Adresses</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="orders.php">My Orders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="wishlist.php">My Wishlist</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>

                    </div>
                </li>
                <li><a href="cart.php"><i class="fas fa-shopping-basket"></i><span class="vis-toggle">My Shopping bag</span></a><span style="position: absolute;display:inline-block;background-color: #4A8239 ; padding-left:5px;width: 15px; height: 15px; font-size: 9px; color: white  ;border-radius: 50%"><?php echo $c->rowCount()?></span></li>
            </ul>
        </nav>
    </div>
</header>
