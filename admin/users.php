<?php
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
                                        <a href="#"><img class="rounded-circle" src="images/admin.jpg" alt=""></a>
                                    </div>
                                </td>
                                <td> saafgh </td>
                                <td>  <span class="name">'.$row["u_name"].'</span> </td>
                                <td> <span class="email">'.$row["u_email"].'</span> </td>
                                <td><span class=""><a href="">'.$listAdd->rowCount().'</a></span></td>
                                <td>
                                    <span <button class="btn-sm btn-warning"><a style="color: white;" href="#">Edit</a></button> </span>
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

