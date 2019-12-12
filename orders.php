<?php


session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    include "inc/headerCon.php";
}
else
{
    header("location:index.php");
}
$orders=$i->getOrders($_SESSION["uname"]);
?>

<main style="margin:10% auto;">
    <div style="background-color: white;" class="container">
        <div class="container table-stats table-responsive table-hover order-table ov-h">
            <table class="table ">
                <thead>
                <tr>
                    <th class="serial">#</th>
                    <th>Innovice Number</th>
                    <th>Date</th>
                    <th>Due Amount</th>
                    <th>Status</th>
                    <th>details</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $x=1;

                foreach ($orders as $o)
                {
                    echo'
                        <tr>
                            <td class="serial">'.$x.'.</td>
                            <td> #'.$o["innoNumber"].' </td>
                            <td> '.$o["OrderDate"].' </td>
                            <td> '.$o["dueAmount"].' DT</span> </td>
                            <td>';
                                if($o["Status"]==1){echo '<span class="badge badge-complete">Complete</span>';}
                                else if($o["Status"]==0) {echo '<span class="badge badge-pending">pending</span>';}
                                else {echo '<span class="badge badge-danger">cancelled</span>';}
                                echo'
                            </td>
                            <td>
                                <form action="orderDet.php" method="post">
                                    <input type="hidden" name="inno" value="'.$o["innoNumber"].'">
                                    <input type="hidden" name="add" value="'.$o["idAdd"].'">
                                    <button type="submit"class="btn ">view details</button>
                                </form>

                            </td>
                        </tr>
                    ';
                    $x++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php
include 'inc/footer.php';
?>
