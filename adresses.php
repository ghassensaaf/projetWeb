<?php

include 'inc/fonctionC.php';
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    include "inc/headerCon.php";
}
else
{
    include "inc/header.php";
}

$a=new fonctionC();
$listA=$a->showAdress($_SESSION['uname']);
?>

<main>
    <div class="container adresses-container" >
        <div class="row">
<?php
$x=1;
foreach ($listA as $ad)
{
echo '
        <div class="col-4 card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Adress '.$x.'</h5>
                    <h6 class="card-subtitle mb-2 text-muted">'.$ad["name"].'</h6>
                    <p class="card-text">'.$ad["street"].', '.$ad["city"].', '.$ad["zip_code"].'</p>
                    <p class="card-text">'.$ad["state"].', '.$ad["country"].'</p>
                    <p class="card-text">'.$ad["phone"].'</p>
                    <hr>
                    <a href="#" class="card-link">Edit Adress</a>
                    <a href="#" class="card-link">Delete Adress</a>
                </div>
            </div>
';
$x++;
}
?>
        </div>
        <div style="margin-top: 10px;">
            <a href=""><i class="fa fa-home"></i> add address</a>
        </div>
    </div>

</main>
<?php
include 'inc/footer.php';
?>
