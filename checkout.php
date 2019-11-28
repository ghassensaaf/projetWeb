<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['email'])) {
    include "inc/headerCon.php";
} else {
    header("location:login.php");
}
$add=$i->showAdress($_SESSION["uname"]);
?>

<main>
    <div class="container">
        <div style="margin: 10% auto;" class="row">
            <div style="box-shadow: 2px 2px 11px 0px rgba(0, 0, 0, 0.4); background-color:white;border: 1px solid gray" class="col-lg-8 col-md-12">
                <form action="">
                    <section id="checkout-addresses-step" class="">
                        <h1 class="mb-3 mt-2 step-title text-center h3"><i class="fa fa-home"></i><span class="step-number"></span> Adresses</h1>
                        <div class="content">
                            <div class="js-address-form">
                                <form method="POST" action="https://www.tunisianet.com.tn/commande" data-refresh-url="//www.tunisianet.com.tn/commande?ajax=1&amp;action=addressForm">
                                    <p class="m-3 text-center">
                                        L'adresse sélectionnée sera utilisée à la fois comme adresse personnelle (pour la facturation) et comme adresse de livraison.
                                    </p>
                                    <div id="delivery-addresses" class="address-selector js-address-selector">
                                        <article class="address-item selected" id="id-address-delivery-address-118911">
                                            <?php
                                            foreach ($add as $ad)
                                            {
                                                echo '
                                                    <header style="background-color: lightgrey; border-radius: 25px; " class="h4">
                                                        <label class="radio-block">
                                                            <span class="custom-radio">
                                                              <input type="radio" name="deliveryAdd" value="" checked="">
                                                              <span></span>
                                                            </span>
                                                            <span class="address-alias h5">'.$ad["add_name"].'</span>
                                                            <span style="color: grey;font-size: 16px" class="address">'.$ad["name"].', '.$ad["street"].', '.$ad["zip_code"].' '.$ad["city"].','.$ad["country"].','.$ad["phone"].'</span>
                                                        </label>
                                                    </header>
                                                ';
                                            }
                                            ?>
                                            <hr>
                                            <footer class="address-footer">
                                                <a href="adresses.php" ><i class="fa fa-edit"></i> Edit Or Add adress</a>
                                                <button type="submit" class="btn-sm btn-success" style="float: right;">Confirm Order</button>
                                            </footer>
                                        </article>



                                </form>
                            </div>

                        </div>
                    </section>
                </form>
            </div>
            <div style="box-shadow: 2px 2px 11px 0px rgba(0, 0, 0, 0.4); background-color:white;border: 1px solid gray" class=" col-lg-4 col-md-12">
                <?php
                    $x=0;foreach ($c as $item) {$x=$x+$item["qty"];}
                    $q=$i->getCart(getHostByName(getHostName()));
                    echo '<h3 class="mt-2 mb-3 text-center"> '.$x.' items </h3>';
                    echo '<ul style="list-style: none;">';
                    $h=0;
                    foreach ($q as $a)
                    {
                        $d=$i->getProd($a["p_id"]);
                        $h=$h+$d["prix"]*$a["qty"];

                        echo '
                            <li class="media">
                                <div class="mb-3">
                                  <a href="#" title="">
                                    <img style="border: 2px solid #4A8239;" width="50px" class="media-object rounded-circle" src="img/prods/'.$d["image"].'" alt="">
                                  </a>
                                </div>
                                <hr>
                                <div class="media-body">
                                  <span class="product-name">'.$d["nom_produit"].'</span>
                                  <span style="font-size: 9px;" class="product-quantity">x'.$a["qty"].'</span>
                                  <div class="product-price pull-right">'.$d["prix"].' Tnd</div>
                                </div>
                            </li>
                            <hr>
                        ';


                    }
                    echo '<li>Prix Totale : '.$h.' Tnd </li>';
                    echo '</ul>';
                ?>
            </div>


        </div>
    </div>
</main>
<?php
include "inc/footer.php";
?>
