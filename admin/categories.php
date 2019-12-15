<?php 
	include 'inc/header.php';
include "../inc/fonctionC.php";

$categorie1=new fonctionC();
$listCat=$categorie1->affichercategories();

 ?>
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
                            <li><a href="#">categories</a></li>
                            <li class="active">categories</li>
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
                        <strong class="card-title col-6">Categorie List</strong>
                        <span class="text-center">
                            <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterFormss">Add categorie</a>
                        </span>
                        <div class="modal fade" id="modalRegisterFormss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">New categorie</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="ajoutcategorie.php" method="post">
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                                <input type="text" id="orangeForm-name" name="nom_categorie" class="form-control validate" placeholder="">
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
                        <table id="ads"   class="table table-hover">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th class="avatar">id Categorie</th>
                                <th>nom categorie</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $x=1;
                                foreach ($listCat as $row) {
                                echo '
                                <tr>
                                <td class="serial">'.$x.'</td>
                                <td><span class="">'.$row["reference"].'</span></td>
                                
                                <td><span class="">'.$row["nom_categorie"].'</span></td>
                                <td>
                                    <div class="text-center">
                                      <a action="modifiercategorie.php" href="" class="btn-sm btn-warning" data-toggle="modal" data-target="#modalRegisterForm'.$x.'">Edit</a>
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit categorie</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                      
                                          
                                            <form action="modifiercategorie.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">Categorie name</label>
                                              <input type="text" id="orangeForm-name" name="nom_categorie" class="form-control validate" value="'.$row['nom_categorie'].'">
                                            </div>
                                            
                                            
                                            <input type="hidden" name="ref" value="'.$row['reference'].'">
                                            <input type="hidden" name="form" value="editcategorie">
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
                                            <h4 class="modal-title w-100 font-weight-bold">Delete Account</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="supprimercategorie.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> categorie name </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <p class="text-center text-danger">Do you Really Want to delete the categorie with the above categorie name</p>
                                            </div>
                                            <input type="hidden" name="reference" value="'.$row['reference'].'">
                                            <input type="hidden" name="form" value="deletecategorie">
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

