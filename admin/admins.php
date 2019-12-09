<?php
session_start();
if ($_SESSION["role"] == "admin")
{

}
else
{
    header("location:login.php");
}
include 'inc/header.php';
include "../inc/fonctionC.php";
$f=new fonctionC();
$la=$f->getAdmins();
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
                            <li class="active">Admins</li>
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
                        <strong class="card-title">Admins List</strong>
                        <?php
                        if($_SESSION["status"]==55)
                        {
                            echo '
                                <span class="text-center">
                            <a href="" class="btn-sm btn-primary" data-toggle="modal" data-target="#addAdmin">Add admin</a>
                        </span>
                        <div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-center">
                                        <h4 class="modal-title w-100 font-weight-bold">New Account</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="forms.php" onsubmit="return addAdmin()" method="post">
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">login</label>
                                                <input type="text" id="login" name="login" class="form-control validate" placeholder="login">
                                                <span class="text-danger" id="err-1"></span>
                                            </div>
                                            <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                                <input type="text" id="name" name="name" class="form-control validate" placeholder="full name">
                                                <span class="text-danger" id="err-2"></span>
                                            </div>
                                            <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="orangeForm-name">Password</label>
                                                <input type="password" id="pwd" name="lpass" class="form-control validate" placeholder="password">
                                                <span class="text-danger" id="err-3"></span>
                                            </div>
                                            <div class="md-form mb-5">
                                                <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                                                <input type="text" id="orangeForm-email" name="email" class="form-control validate" placeholder="email@examle.xyz">
                                                <span class="text-danger" id="err-4"></span>
                                            </div>

                                        </div>
                                        <input type="hidden" name="form" value="addAdmin">
                                        <div class="modal-footer d-flex justify-content-center">
                                            <input type="submit" class="btn btn-primary" value="submit changes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            ';
                        }
                        ?>
                    </div>

                    <div class="table-stats order-table ov-h">
                        <table id="ads" class="table table-hover">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th class="avatar">Avatar</th>
                                <th>Status</th>
                                <th>login</th>
                                <th>Name</th>
                                <th>Email</th>
                                <?php
                                if($_SESSION["status"]==55)
                                {
                                    echo '
                                    <th>Edit</th>
                                    <th>Edit Status</th>
                                    ';
                                }
                                ?>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $x=1;
                            foreach ($la as $a)
                            {
                                echo '
                                <tr>
                                    <td class="serial">'.$x.'.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <div class="text-center text-capitalize " style="font-size: xx-large; color: white; padding:2.5% 25%; width: 50px; height: 50px; border-radius: 50%;  background-color: gray;" >'.$a["login"][0].'</div>
                                        </div>
                                    </td>
                                    <td>';
                                        if($a["status"]==1)
                                        {
                                            echo '<span class="badge badge-success">Active</span>';
                                        }
                                        else if($a["status"]==55)
                                        {
                                            echo '<span class="badge badge-complete">Super Admin</span>';
                                        }
                                        else
                                        {
                                            echo '<span class="badge badge-pending">Suspended</span>';
                                        }
                                    echo '
                                    </td>
                                    <td> '.$a["login"].' </td>
                                    <td>  <span class="name">'.$a["name"].'</span> </td>
                                    <td> <span class="email"> '.$a["email"].'</span> </td>';
                                        if ($_SESSION["status"]==55)
                                        {
                                            echo '
                                            <td>
                                    <div class="text-center">
                                      <a href="" class="btn-sm btn-warning" data-toggle="modal" data-target="#modalRegisterForm'.$x.'">Edit</a>
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Edit Admin</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">Username</label>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="'.$a["login"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
                                              <input type="text" id="orangeForm-name" name="name" class="form-control validate" value="'.$a["name"].'">
                                            </div>
                                            <div class="md-form mb-5">
                                              <label data-error="wrong" data-success="right" for="orangeForm-email">Email</label>
                                              <input type="email" id="orangeForm-email" name="email" class="form-control validate" value="'.$a["email"].'">
                                            </div>
                                    
                                            
                                            <input type="hidden" name="login" value="'.$a["login"].'">
                                            <input type="hidden" name="form" value="editAdmin">
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
                                    <div class="text-center">';
                                        if($a['status']==1)
                                        {
                                            echo '<a href="" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalRegisterForm'.$x.$x.'">suspend</a>';
                                        }
                                        else if($a['status']==55)
                                        {
//                                            echo '<a href="" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRegisterForm'.$x.$x.'">activate</a>';
                                        }
                                        else
                                        {
                                            echo '<a href="" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRegisterForm'.$x.$x.'">activate</a>';
                                        }

                                        echo '
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
                                          <form action="forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Username </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate" value="'.$a["login"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">';
                                            if($a['status']==1)
                                            {
                                                echo '<p class="text-center text-danger">Do you Really Want to Suspend the admin with the above login</p>';
                                            }
                                            else
                                                echo '<p class="text-center text-success">Do you Really Want to Activate the admin with the above username</p>';
                                            echo '
                                            </div>
                                            <input type="hidden" name="login" value="'.$a["login"].'">
                                            <input type="hidden" name="status" value="'.$a["status"].'">
                                            <input type="hidden" name="form" value="editStatus">
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
                                            ';
                                        }
                                        echo '
                                        
                                    

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

<?php  include 'inc/footer.php'?>



<!-- Right Panel -->

<!-- Scripts -->


