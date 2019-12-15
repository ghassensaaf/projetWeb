<?php 
	include 'inc/header.php';
  include "inc/categorie.php";
include "../inc/fonctionC.php";

$produit1=new fonctionC();
$listprod=$produit1->afficherproduits();
?>

<script type="text/javascript">
  function verif()
  {
    var i=0;
    if(f.nom_produit.value=="")
    {
      alert("champs vide!");
      i--;
      return false;
    }
    if(i==0)
      return true;
  }
</script>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">prods/orders</a></li>
                            <li class="active">prods</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card row">
                    <div class="card-header">
                        <strong class="card-title col-6">Product List</strong>
                        <span class="text-center">
                            <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterFormss">Add product</a>
                        </span>
                        <div class="modal fade" id="modalRegisterFormss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">New product</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form name="f" action="ajoutproduit.php" method="POST" enctype="multipart/form-data" onSubmit="return verif()" >
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                <label on="return verif()" data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                                <input type="text" id="orangeForm-name" name="nom_produit" class="form-control validate" placeholder="">
                                                <label data-error="wrong" data-success="right" for="orangeForm-description">Description</label>
                                                <input type="text" id="orangeForm-description" name="description" class="form-control validate" placeholder="">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">Price</label>
                                                <input type="text" id="orangeForm-price" price="prix" name="prix" class="form-control validate" placeholder="">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">Categorie</label>
                                                <select id="orangeForm-name" name="catId" class="form-control validate">
                                              <?php
                                              $cat=new fonctionC();
                                              $list2=$cat->affichercategories();
                                              foreach($list2 as $rw)
                                                echo'
                                              <option value='.$rw['reference'].'>'.$rw['nom_categorie'].'</option>';
                                              ?>
                                            </select>
                                            <label data-error="wrong" data-success="right" for="orangeForm-name">Image</label>
                                                <input type="file" id="orangeForm-price"  name="image" class="form-control validate" placeholder="">
                                               
                                        
                                            </div>
                                            

                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <input type="submit" class="btn btn-primary" value="submit changes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table id="ads"  class="table table-hover">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th class="avatar">product id</th>
                                <th>product name</th>
                                <th>price</th>
                                <th>description</th>
                                <th>image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $x=1;
                                foreach ($listprod as $row) {
                                echo '
                                <tr>
                                <td class="serial">'.$x.'</td>
                                <td><span class="">'.$row["reference"].'</span></td>
                                
                                <td><span class="">'.$row["nom_produit"].'</span></td>
                                <td><span class="">'.$row["prix"].'</span></td>
                                <td><span class="">'.$row["description"].'</span></td>
                                <td><img src="'.$row['image'].'"> </img></td>
                                
                                    <td><div class="text-center">
                                      <a href="" class="btn-sm btn-warning" data-toggle="modal" data-target="#modalRegisterForm'.$x.'">Edit</a>
                                    </div></td>
                                    <div class="modal fade" id="modalRegisterForm'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit Account</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                      
                                          <form action="updateP.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">categorie</label>
                                              <select id="orangeForm-name" name="catId" class="form-control validate">
                                              ';
                                              $cat=new fonctionC();
                                              $list2=$cat->affichercategories();
                                              foreach($list2 as $rw)
                                                echo'
                                              <option value='.$rw['reference'].'>'.$rw['nom_categorie'].'</option>';
                                              echo'

                                              </select>
                                            </div>
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                              <input type="text" id="orangeForm-name" name="nom" class="form-control validate" value="'.$row['nom_produit'].'">
                                            </div>
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-email">Description</label>
                                              <input type="text" id="orangeForm-email" name="desc" class="form-control validate" value="'.$row['description'].'">
                                            </div>

                                            <div class="md-form mb-4">
                                              <label data-error="wrong" data-success="right" for="orangeForm-pass">Prix</label>
                                              <input type="number" id="orangeForm-pass" name="prix" class="form-control validate" value="'.$row['prix'].'">
                                            </div>
                                            <div class="md-form mb-4">
                                              <label data-error="wrong" data-success="right" for="orangeForm-pass">Image</label>
                                              <input type="file" id="orangeForm-price" price="prix" name="image" class="form-control validate" placeholder="">
                                            </div>
                                            <input type="hidden" name="ref" value="'.$row['reference'].'">
                                            <input type="hidden" name="form" value="editUser">
                                          </div>
                                          <div class="modal-footer d-flex justify-content-center">
                                            <input type="submit" class="btn btn-primary" value="submit changes">
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>



                                </td>
                                <td>
                                    <div class="text-center">
                                      <a href="" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalRegisterForm'.$x.$x.'">Delete</a>
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm'.$x.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Delete Produit</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="deleteP.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Username </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <p class="text-center text-danger">Do you Really Want to delete the categorie with the above reference</p>
                                            </div>
                                            <input type="hidden" name="id" value="'.$row['reference'].'">
                                            <input type="hidden" name="form" value="deleteUser">
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
                            ';$x++;}?>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->



<?php  include 'inc/footer.php'?>

