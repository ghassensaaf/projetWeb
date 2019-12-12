<?php
session_start();
if($_SESSION["role"]=="admin")
{

}
else
{
    header("location:login.php");
}
include 'inc/header.php';
include '../inc/fonctionC.php';
$t=new fonctionC();
$listP=$t->getProds()->fetchAll();
$prom=$t->getProms();
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
                                <li><a href="#">Products</a></li>
                                <li class="active">list</li>
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
                            <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterFormss">Add Product</a>
                        </span>
                            <div class="modal fade" id="modalRegisterFormss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">New Account</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="../new_user.php" method="post">
                                            <div class="modal-body mx-3">
                                                <div class="md-form mb-5">
                                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Username</label>
                                                    <input type="text" id="orangeForm-name" name="luser" class="form-control validate" placeholder="">
                                                </div>
                                                <div class="md-form mb-5">
                                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                                    <input type="text" id="orangeForm-name" name="name" class="form-control validate" value="">
                                                </div>
                                                <div class="md-form mb-5">
                                                    <label data-error="wrong" data-success="right" for="orangeForm-name">Password</label>
                                                    <input type="password" id="orangeForm-name" name="lpass" class="form-control validate" value="">
                                                </div>
                                                <div class="md-form mb-5">
                                                    <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                                                    <input type="email" id="orangeForm-email" name="email" class="form-control validate" value="">
                                                </div>
                                                <input type="hidden" name="role" value="<?php echo $_SESSION['role'] ?>">
                                                <div class="md-form mb-4">
                                                    <label data-error="wrong" data-success="right" for="orangeForm-pass">Phone number</label>
                                                    <input type="text" id="orangeForm-pass" name="phone" class="form-control validate" value="">
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
                            <table id="ads" class="table table-hover text-center">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar">Picture</th>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    <th>Adresses</th>
                                    <th>Edit</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=1;
                                foreach ($listP as $row)
                                {
                                    echo '
                                <tr>
                                <td class="serial">'.$x.'</td>
                                <td class="avatar">
                                    <img class="rounded-circle" src="../img/prods/'.$row["image"].'" alt="IMG_Prod'.$x.'">
                                </td>
                                <td>'.$row["reference"].'</td>
                                <td>  <span class="name">'.$row["nom_produit"].'</span> </td>
                                <td class="text-center">';if($row["en_prom"]==0){echo '<span class="badge badge-pending"> Not In Promotion</span>';}else{echo '<span class="badge badge-complete">In Promotion</span>';} echo'</td>
                                <td>
                                    <div class="text-center">
                                      <a href="" class="btn-sm btn-warning" data-toggle="modal" data-target="#modalRegisterForm">Edit</a>
                                    </div>
                                    
                                </td>
                                <td>';
                                    if($row["en_prom"]==0)
                                    {
                                        echo '
                                            <div class="text-center">
                                                <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#modalRegisterForm'.$x.'">Add To Promotion</a>
                                            </div>
                                            <div class="modal fade" id="modalRegisterForm'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Add Promotion</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Product Name </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="#'.$row["reference"].'---'.$row["nom_produit"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Promotion </p>
                                              <select class="form-control" name="prom" id="">';
                                                foreach ($prom as $promot)
                                                {
                                                    echo '<option value="'.$promot["id"].'">'.$promot["pourcentag"].'%</option>';
                                                }

                                                echo '
                                                </select>
                                            </div>
                                            <input type="hidden" name="form" value="addProm">
                                            <input type="hidden" name="pId" value="'.$row["reference"].'">
                                          </div>
                                          <div class="modal-footer d-flex justify-content-center">
                                            <input type="submit" class="btn btn-danger" value="Confirm">
                                            <input type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close" value="Cancel">

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                        ';
                                    }
                                    else
                                    {
                                        echo '
                                        <div class="text-center">
                                            <form action="forms.php" method="post">
                                                <input type="hidden" name="form" value="remProm">
                                                <input type="hidden" name="pId" value="'.$row["reference"].'">
                                                <button  class="btn-sm btn-outline-info" type="submit">Remove Promotion</button>
                                            </form>
                                        </div>
                                        ';
                                    }
                                   
                                echo '</td>
                            </tr>
                                ';
                                    $x++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
<?php
include "inc/footer.php";
?>