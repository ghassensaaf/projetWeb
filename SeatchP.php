<?php
include_once "admin/inc/produit.php";

$f=new fonctionC();

if(isset($_GET['ID_Cat']))
{
  if(isset($_GET['kword']))
  {
    $p=$f->afficherproduits_cat_kword($_GET['ID_Cat'],$_GET['kword']);
  }
  else
    $p=$f->afficherproduits_cat($_GET['ID_Cat']);
}


else
{
  if(isset($_GET['kword']))
  {
    $p=$f->afficherroduits_kword($_GET['kword']);
  }
  else
    $p=$f->afficherproduits();
}}
?>

 <div class="latest_product_inner" id="DATA">
                        <div class="row">
                            <?php foreach($p as $row)
                            echo'
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <div class="product-img">
                                        <img height="250px" width="250px"
                                            class="card-img"
                                            src="admin/'.$row['image'].'"
                                            alt=""
                                        />
                                        <div class="p_icon">
                                            <a href="single.product.php?ID='.$row["reference"].'">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="#">
                                                <i class="far fa-heart"></i>
                                            </a>
                                            <a href="#">
                                                <i class="fas fa-cart-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-btm">
                                        <a href="#" class="d-block">
                                            <h4>'.$row['nom_produit'].'</h4>
                                        </a>
                                        <div class="mt-3">
                                            <span class="mr-4">'.$row['prix'].' DT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>'; ?>


                        </div>
                    </div>