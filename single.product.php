<?php
if(isset($_SESSION["uname"]))
{
    include "inc/headerCon.php";
}
else
{
    include "inc/header.php";
}
include_once "admin/inc/produit.php";
$f=new fonctionC();
if(isset($_GET['ID']))
$prod=$f->getProduit($_GET['ID']);
else
header('Location: index.php');
?>

<section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    

                    <div class="latest_product_inner">
                        <div class="row">

                          <?php
                           foreach($prod as $row)
  	                       
  		                  ?>


						


<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo $row["nom_produit"]; ?></h3>

						  <th><img width="500px" height="500px" src="admin/<?php echo $row['image'];?>"/></th> 

						<h2><?php echo $row["prix"]; ?> DT</h2>
						
						<p><?php echo $row["description"]; ?></p>
						<div class="product_count">
              <label for="qty">Quantity:</label>
              <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase -count" type="button"><i class="ti-angle-left"></i></button>
							<input type=items"text" name="qty" id="sst" size="2" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
               class="reduced items-count" type="button"><i class="ti-angle-right"></i></button>
							<a class="button primary-btn" href="#">Add to Cart</a>               
						</div>
						<div class="card_area d-flex align-items-center">
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
              


                        </div>
                    </div>
                </div>
            </div>    
        </div>   
 </section>        
<?php
    include "inc/footer.php"
?>