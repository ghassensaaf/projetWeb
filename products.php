<?php
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    include "inc/headerCon.php";
}
else
{
    include "inc/header.php";
}
include "inc/fonctionC.php";
$f=new fonctionC();
$p=$f->getProds();
?>
    <section class="cat_product_area section_gap">
        <div class="container">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting">
                                <option value="1">Default sorting</option>
                                <option value="2">Default sorting 01</option>
                                <option value="4">Default sorting 02</option>
                            </select>
                            <select class="show">
                                <option value="1">Show 12</option>
                                <option value="2">Show 14</option>
                                <option value="4">Show 16</option>
                            </select>
                        </div>
                    </div>

                    <div class="latest_product_inner">
                        <div class="row">
                          <?php
                            foreach ($p as $t)
                            {

                              echo '
                              <div class="col-lg-4 col-md-6">
                                  <div class="single-product">
                                      <div class="product-img">
                                          <img
                                              class="card-img"
                                              src="img/prods/'.$t["image"].'"
                                              alt=""
                                          />
                                          <div class="p_icon">
                                              <a href="#">
                                                  <i class="far fa-eye"></i>
                                              </a>
                                              <a href="#">
                                                  <i class="far fa-heart"></i>
                                              </a>
                                              <form method="post" action="admin/forms.php">
                                                  <input type="hidden" name="pId" value="'.$t["reference"].'" >
                                                  <input type="hidden" name="form" value="addCart" >
                                                  <input type="submit" value="aa"><i class="fas fa-cart-plus"></i>

                                              </form>

                                          </div>
                                      </div>
                                      <div class="product-btm">
                                          <a href="#" class="d-block">
                                              <h4>'.$t["nom_produit"].'</h4>
                                          </a>
                                          <div class="mt-3">
                                              <span class="mr-4">'.$t["prix"].' dt/m²</span>

                                          </div>
                                      </div>
                                  </div>
                              </div>
                              ';
                            }
                           ?>


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
                                <ul class="list">
                                    <li>
                                        <a href="#">Inner Wall</a>
                                    </li>
                                    <li>
                                        <a href="#">Outer Wall</a>
                                    </li>
                                    <li>
                                        <a href="#">Bedhead</a>
                                    </li>
                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Color Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    <li>
                                        <a href="#">white</a>
                                    </li>
                                    <li>
                                        <a href="#">grey</a>
                                    </li>
                                    <li class="active">
                                        <a href="#">Black</a>
                                    </li>
                                    <li>
                                        <a href="#">yellow</a>
                                    </li>

                                </ul>
                            </div>
                        </aside>

                        <aside class="left_widgets p_filter_widgets">
                            <div class="l_w_title">
                                <h3>Price Filter</h3>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <div id="slider-range"></div>
                                    <div class="">
                                        <label for="amount">Price : </label>
                                        <input type="text" id="amount" readonly />
                                    </div>
                                </div>
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
