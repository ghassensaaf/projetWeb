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
$n=new fonctionC();
$u=$n->getUser($_SESSION['uname']);


foreach ($u as $t)
{
?>

<main style="margin-top: 100px;">

    <div class="account-wrap">
        <div style="padding: 20% 10%; ">
            <h3 style="width:30%;margin: auto;">My Account</h3>
            <div class="login-form">
                <form class="signin" action="admin/forms.php" method="post">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="uname" class="label">username</label>
                            <input style="background-color: darkgray;" id="uname" name="uname" type="text" class="input" value="<?php echo $t['u_uname']?>" placeholder="name" disabled>
                        </div>
                        <div class="group">
                            <label for="name" class="label">name</label>
                            <input id="name" name="name" type="text" class="input" value="<?php echo $t['u_name']?>" placeholder="name">
                        </div>
                        <div class="group">
                            <label for="email" class="label">Email</label>
                            <input id="email" name="email" type="email" class="input" value="<?php echo $t['u_email']?>" placeholder="user@example.xyz">
                        </div>

                        <div class="group">
                            <label for="phone" class="label">Phone Number</label>
                            <input type="text" id="phone" name="phone"  class="input" value="<?php echo $t['u_phone']?>" placeholder="21 234 567">
                        </div>
                        <div class="group">
                            <label for="pwd" class="label">New Password</label>
                            <input type="password" id="pwd" name="pwd"  class="input" value="" placeholder="new password">
                            <label for="pwd" class="label"><span style="font-size: 9px;">  leave blank if won't change</span></label>
                        </div>
                        <input type="hidden" name="uname" value="<?php echo $t['u_uname']?>">
                        <input type="hidden" name="form" value="editUser">
                        <div class="group">
                            <input type="submit" class="button" value="Submit Changes">
                        </div>


                    </div>
                </form>
            </div>
            </div>
        </div>

</main>

<?php
}
    include 'inc/footer.php';
?>
