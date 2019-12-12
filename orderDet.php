
<?php
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    include "inc/headerCon.php";
}
else
{
    header("location:index.php");
}
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
                            <form action="print.php" method="get">

                      <input type="hidden" id="refcommande" name="nom_produit" value="<?php echo $p["nom_produit"] ?>">
                      <input type="hidden" id="prixtotal" name="qty" value="<?php echo $o["qty"] ?>">
                      <input type="hidden" id="date" name="prix" value="<?php echo $p["prix"] ?>">
                      <input type="hidden" id="detail" name="tt" value="<?php echo $v ?>">

                                <input style="background: none; border: none; color: blue; text-decoration: underline;" type="submit" value="Imprimer">
                            </form>
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
<?php
include 'inc/footer.php';
?>
