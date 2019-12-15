<?php
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    include "inc/headerCon.php";
    $fid=$i->getSoldeF($_SESSION["uname"]);
}
else
{
    include "inc/header.php";
}

?>

        <div class="container cart-container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ol-lg-12">
                        <div class="table-content wnro__table table-responsive">
                            <table>
                                <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $v=0;
                                if($c->rowCount()==0)
                                {
                                    echo '
                                    <tr>
                                        <td colspan="6"><h3>Your Cart Is Empty</h3></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6"><h3>Go to <a href="products.php">shop</a></h3></td>
                                    </tr>
                                    ';
                                }
                                foreach ($c as $row)
                                {
                                    $d=$i->getProd($row["p_id"]);

                                    $v=$v+$d["prix"]*$row["qty"];
                                    echo '
                               
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="admin/'.$d["image"].'" width="80px" alt="product img"></a></td>
                                    <td class="product-name"><a href="#">'.$d["nom_produit"].'</a></td>
                                    <td class="product-price"><span class="amount">'.$d["prix"].' TND</span></td>
                                    <td class="product-quantity">
                                        <form action="admin/forms.php" method="post">
                                            <input min="1" type="number" name="qty" value="'.$row["qty"].'">
                                            <input type="hidden" name="pId" value="'.$row["p_id"].'">
                                            <input type="hidden" name="form" value="updateCart" >
                                            <button  type="submit" class="btn btn-outline-success"><i class="fa fa-angle-double-right"></i></button>
                                        </form>
                                    </td>
                                    <td class="product-subtotal">'.($d["prix"]*$row["qty"]).'</td>
                                    <td class="product-remove">
                                        <form action="admin/forms.php" method="post">
                                            <input type="hidden" name="pId" value="'.$row["p_id"].'">
                                            <input type="hidden" name="form" value="deleteCart" >
                                            <button style="width: 40%;" type="submit" class="btn btn-outline-danger">X</button>
                                        </form>
                                    </td>
                                </tr>
                                ';
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    <div class="cartbox__btn">
                        <ul class="cart__btn__list d-flex flex-wrap flex-md-nowrap flex-lg-nowrap justify-content-between">

                            <?php
                            if($c->rowCount()!=0)
                            {
                                echo '  <li><a href="#">Coupon Code</a></li>
                                        <li><a href="#">Apply Code</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>';
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="cartbox__total__area">
                        <div class="cartbox-total d-flex justify-content-between">
                            <ul class="cart__total__list">
                                <li>Cart total</li>
                                <li>fidelity Discount</li>
                            </ul>
                            <ul class="cart__total__tk">
                                <li><?php echo $v?> TND</li>
                                <li><?php if(isset($_SESSION["uname"])){if($v > $fid["solde"]){echo $fid["solde"];}else {echo $v;}} else {echo '0.00';} ?> TND</li>
                            </ul>
                        </div>
                        <div class="cart__total__amount">
                            <span>Grand Total</span>
                            <span><?php if(isset($_SESSION["uname"])){ if($v > $fid["solde"]){echo $v-$fid["solde"];}else {echo "0.00";}} else {echo '0.00';} ?> TND</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
include "inc/footer.php";
?>
