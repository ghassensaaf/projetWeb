<script>
function showResult(str) {
  
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("DATA").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","SearchP.php?<?php if(isset($_GET['ID'])) if($_GET['ID']!="") echo"ID_Cat=".$_GET['ID']."&"; ?>kword=".concat(document.getElementById("kword").value));
  xmlhttp.send();
}
</script>
<?php
session_start();
if(isset($_SESSION["uname"]))
{
    include "inc/headerCon.php";
}
else
{
    include "inc/header.php";
}

include_once "admin/inc/produit.php";
$Prod=new fonctionC();
if(isset($_GET['ID']))
$list=$Prod->afficherproduits_cat($_GET['ID']);
else
$list=$Prod->afficherproduits();

?>
<?php 
include_once "admin/inc/categorie.php";

$cat= new fonctionC();
$list2=$cat->affichercategories();
?>
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    
  <div class="product_top_bar">
                        
    <input class="search-f mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="kword" onkeyup="showResult(this.value)" style="color: black">
                    </div>

                    <div class="latest_product_inner" id="DATA">
                        <div class="row">
                            <?php foreach($list as $row)
                            {
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
                                            </a>';
                                                                                          if(isset($_SESSION['email']))
                                              {
                                                  echo'<form style="display: inline-block;"  method="post" action="admin/forms.php">
                                                  <input type="hidden" name="pId" value="'.$row["reference"].'" >
                                                  <input type="hidden" name="un" value="'.$_SESSION['email'].'" >
                                                  <input type="hidden" name="form" value="addWish" >
                                                  <button id="add-to-cart" type="submit"><i class="far fa-heart"></i></i></button>
                                              </form>';
                                              }
                                                echo'
                                              <form style="display: inline-block;"  method="post" action="admin/forms.php">
                                                  <input type="hidden" name="pId" value="'.$row["reference"].'" >
                                                  <input type="hidden" name="form" value="addCart" >
                                                  <button id="add-to-cart" type="submit"><i class="fas fa-cart-plus"></i></button>
                                              </form>
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
                            </div>'; }?>


                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Browse Categories</h3>
                            </div>
                            <div class="widgets_inner">
                                 <?php
                        foreach($list2 as $rw)
                            echo'
                        <a class="dropdown-item" href="products.php?ID='.$rw['reference'].'">'.$rw['nom_categorie'].'</a>
                        <div class="dropdown-divider"></div>';
                    ?>
                    

                    <a class="dropdown-item" href="products.php">Ascending Order</a>
                            </div>
                        </aside>

                        

                        
                    </div>
                </div>
            </div>
        </div>

        
    </section>
<?php
    include "inc/footer.php"
?>