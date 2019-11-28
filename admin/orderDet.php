<?php


session_start ();
include "inc/header.php";
include "../inc/fonctionC.php";
$i=new fonctionC();
$orders=$i->getOrderProds($_POST["inno"]);
$add=$i->showAdress($_SESSION["uname"],$_POST["add"])->fetch();
?>

<main style="margin:10% auto;">
    <div class="container adresses-container">
        <div class="row">
            <div style="background-color: #fff; border: 2px solid grey; " class="col-lg-8 col-md-12 card p-0" >
                <div class="card-header">
                    <strong class="card-title">Order Details: # <?php echo $_POST["inno"]?> </strong>
                </div>
                <div class="card-body">
                    <table class="table text-center">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">U Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $x=1;
                        $v=0;
                        foreach ($orders as $o)
                        {
                            $p=$i->getProd($o["prodId"]);
                            echo'
                                <tr>
                                    <th scope="row">'.$x.'</th>
                                    <td>'.$p["nom_produit"].'</td>
                                    <td>'.$o["qty"].'</td>
                                    <td>'.$p["prix"].' TND</td>
                                </tr>
                                ';
                            $v=$v+$o["qty"]*$p["prix"];
                            $x++;
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td class="text-center" style="background-color: #212529; color: white;"></td>
                            <td class="text-center" style="background-color: #212529; color: white;"></td>
                            <td class="text-center" style="background-color: #212529; color: white;"><strong>Total</strong></td>
                            <td><?php echo $v." TND"?></td>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div style="background-color: #fff; border: 2px solid grey;height: 250px" class="card-body col-lg-4 col-md-12">
                <h4>Order Address</h4>
                <h5 class="text-capitalize card-title"><?php echo $add["add_name"]?></h5>
                <h6 class="text-capitalize card-subtitle mb-2 text-muted"><?php echo $add["name"]?></h6>
                <p class="card-text"><?php echo $add["street"]?>,<?php echo  $add["city"]?>,<?php echo  $add["zip_code"]?></p>
                <p class="card-text"><?php echo $add["state"]?>,<?php echo  $add["country"]?></p>
                <p class="card-text"><?php echo $add["phone"]?></p>
            </div>
        </div>
    </div>
</main>
<?php  include 'inc/footer.php'?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>