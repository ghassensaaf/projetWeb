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
$wish=$i->getWish($_SESSION["email"]);
?>

<main style="margin:10% auto;">
    <div style="background-color: white;" class="container">
        <div class="container table-stats table-responsive table-hover order-table ov-h">
            <table class="table text-center">
                <thead>
                <tr>
                    <th class="serial">#</th>
                    <th></th>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th class="text-center">detail</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x=1;
                if($wish->rowCount()==0)
                {
                    echo '
                        <tr>
                            <td colspan="7" class="text-center"> <h3>You Have No Item In Your Wishlist </h3></td>
                        </tr>
                        <tr>
                            <td colspan="7" class="text-center"> <h4>Go to <a href="products.php">shop</a> And Add Some</h4></td>
                        </tr>
                    ';
                }
                foreach ($wish as $o)
                {
                    $p=$i->getProd($o["pId"]);
                    echo'
                        <tr>
                            <td class="serial">'.$x.'.</td>
                            <td><img class="rounded-circle" src="admin/'.$p["image"].'" alt=""></td>
                            <td> #'.$p["reference"].' </td>
                            <td>'.$p["nom_produit"].'</td>
                            <td>'.$p["prix"].'<sup>TND</sup></td>
                            <td class="text-center">';if($p["en_prom"]==0){echo '<span class="badge badge-pending"> Not In Promotion</span>';}else{echo '<span class="badge badge-complete">In Promotion</span>';} echo'</td>
                            <td>
                                    <div>
                                        <a href="" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalRegisterForm1'.$x.'">Delete</a>
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm1'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Delete From Wishlist</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="admin/forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Product Id </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="#'.$p["reference"].'---'.$p["nom_produit"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <p class="text-center text-danger">Do you Really Want to delete this product from your wishlist</p>
                                            </div>
                                            <input type="hidden" value="deletWish" name="form" >
                                            <input type="hidden" value="'.$p["reference"].'" name="pId" >
                                            <input type="hidden" value="'.$_SESSION["email"].'" name="un" >
                                          </div>
                                          <div class="modal-footer d-flex justify-content-center">
                                            <input type="submit" class="btn btn-danger" value="Confirm">
                                            <input type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close" value="Cancel">

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                            </td>
                        </tr>
                    ';
                    $x++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include 'inc/footer.php';
?>
