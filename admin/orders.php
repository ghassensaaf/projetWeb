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
$la=$f->getOrders();

?>



<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                        <form action="search.php" method="post">
                                            <input type="text" name="nom" id="headerSearch" placeholder="Type for search">
                                            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </form>
                                        <form action="#" method="get">
                                                                                   <select name="select" id="sortByselect" onchange="javascript:handleSelect(this)">

                                                                                       <option  value="tridesc" >descendant </option>
                                                                                       <option value="triasc">ascendant</option>
                                                                                   </select>
                                                                                   <input type="submit" class="d-none" value="tridesc.php">
                                                                               </form>
                                                                               <script type="text/javascript">
                                                                                   function handleSelect(elm)
                                                                                   {
                                                                                       window.location = elm.value+".php";
                                                                                   }
                                                                               </script>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Prods</a></li>
                            <li class="active">Orders</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 40%;" class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Order List</strong>
                    </div>

                    <div class="table-stats order-table ov-h">
                        <table id="ads" class="table table-hover text-center">
                            <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th class="avatar">Innovice number</th>
                                <th>Status</th>
                                <th>login</th>
                                <th>Date</th>
                                <th>Amount Due</th>
                                <th class="text-center">Edit Status</th>
                                <th></th>
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
                                        <form action="orderDet.php" method="post">
                                            <input type="hidden" name="add" value="'.$a["idAdd"].'">
                                            <input type="hidden" name="inno" value="'.$a["innoNumber"].'">
                                            <button class="btn-outline-dark" type="submit"># '.$a["innoNumber"].'</button>
                                        </form>
                                    </td>
                                    <td>';
                                if($a["Status"]==-1)
                                {
                                    echo '<span class="badge badge-danger">cancelled</span>';
                                }
                                else if($a["Status"]==1)
                                {
                                    echo '<span class="badge badge-complete">confirmed</span>';
                                }
                                else
                                {
                                    echo '<span class="badge badge-pending">pending</span>';
                                }
                                echo '
                                    </td>
                                    <td> '.$a["uname"].' </td>
                                    <td>  <span class="name">'.$a["OrderDate"].'</span> </td>
                                    <td> <span class="email"> '.$a["dueAmount"].'</span> </td>';
                                if ($_SESSION["status"]==55)
                                {
                                    echo '

                                    <td>
                                    <div class="text-center">';
                                    if($a['Status']==0)
                                    {
                                        echo '<a href="" class="btn-sm btn-success" data-toggle="modal" data-target="#modalRegisterForm'.$x.$x.'">confirm</a>';
                                        echo '<a href="" class="btn-sm btn-danger" data-toggle="modal" data-target="#modalRegisterForm'.$x.'">cancel</a>';
                                    }
                                    else if($a['Status']==1)
                                    {
                                        echo '<span class="badge badge-complete">confirmed</span>';
                                    }
                                    else
                                    {
                                        echo '<span class="badge badge-danger">cancelled</span>';
                                    }

                                    echo '
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Cancel Order</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Innovice number </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate text-center" value="'.$a["innoNumber"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                                <p class="text-center text-danger">Do you Really Want to cancel the order with the above innovice number</p>
                                            </div>
                                            <input type="hidden" name="inno" value="'.$a["innoNumber"].'">
                                            <input type="hidden" name="form" value="cancelOrder">
                                          </div>
                                          <div class="modal-footer d-flex justify-content-center">
                                            <input type="submit" class="btn btn-danger" value="Confirm">
                                            <input type="button" class="btn btn-success" data-dismiss="modal" aria-label="Close" value="Cancel">

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal fade" id="modalRegisterForm'.$x.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Confirm Order</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <form action="forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Innovice number </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate text-center" value="'.$a["innoNumber"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                                    <p class="text-center text-success">Do you Really Want to confirm the order with the above innovice number</p>
                                            </div>
                                            <input type="hidden" name="inno" value="'.$a["innoNumber"].'">
                                            <input type="hidden" name="form" value="confirmOrder">
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
                                if($a['Status']==1)
                                {
                                    echo '<td>same</td>';
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
>>>>>>> 7f12a9ac9c4e2c8cea74b5c90d0152d268be8101
