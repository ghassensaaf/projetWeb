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
$listClient=$t->showUsers();
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
                            <li><a href="#">Users</a></li>
                            <li class="active">Users</li>
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
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">User List</strong>
                    </div>
                    <div class="table-stats order-table ov-h">
                        <table class="table ">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th class="avatar">Avatar</th>
                                <th>Uname</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Adresses</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x=1;
                            foreach ($listClient as $row)
                            {
                                $listAdd=$t->showAdress($row["u_uname"]);
                                echo '
                                <tr>
                                <td class="serial">'.$x.'</td>
                                <td class="avatar">
                                    <div class="round-img">
                                        <div class="text-center text-capitalize " style="font-size: xx-large; color: white; padding:2.5% 25%; width: 50px; height: 50px; border-radius: 50%;  background-color: gray;" >'.$row["u_name"][0].'</div>
                                    </div>
                                </td>
                                <td>'.$row["u_uname"].'</td>
                                <td>  <span class="name">'.$row["u_name"].'</span> </td>
                                <td> <span class="email">'.$row["u_email"].'</span> </td>
                                <td><span class="">'.$listAdd->rowCount().'</span></td>
                                <td>
                                    <div class="text-center">
                                      <a href="" class="btn-sm btn-warning" data-toggle="modal" data-target="#modalRegisterForm'.$x.'">Edit</a>
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit Account</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="editUser.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">Username</label>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="'.$row["u_uname"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                              <input type="text" id="orangeForm-name" name="name" class="form-control validate" value="'.$row["u_name"].'">
                                            </div>
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                                              <input type="email" id="orangeForm-email" name="email" class="form-control validate" value="'.$row["u_email"].'">
                                            </div>
                                    
                                            <div class="md-form mb-4">
                                              <label data-error="wrong" data-success="right" for="orangeForm-pass">Phone number</label>
                                              <input type="text" id="orangeForm-pass" name="phone" class="form-control validate" value="'.$row["u_phone"].'">
                                            </div>
                                            <input type="hidden" name="uname" value="'.$row["u_uname"].'">
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
                                <span <button class="btn-sm btn-danger"><a style="color: white;" href="#">Delete</a></button> </span>
                                </td>
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

<div class="clearfix"></div>

<?php  include 'inc/footer.php'?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>

