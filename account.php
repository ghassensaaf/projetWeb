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
?>

<main style="margin-top: 100px;">

    <div class="account-wrap">
        <div style="padding: 20% 10%; ">
            <h3 style="width:30%;margin: auto;">My Account</h3>
            <div class="login-form">
                <form class="signin" action="editAcc.php" method="post">
                    <div class="sign-in-htm">
                        <div class="group">
                            <label for="name" class="label">name</label>
                            <input id="name" name="name" type="text" class="input" value="<?php echo $_SESSION['uname']?>" placeholder="name">
                        </div>
                        <div class="group">
                            <label for="email" class="label">Email</label>
                            <input id="email" name="email" type="email" class="input" value="<?php echo $_SESSION['email']?>" placeholder="example@web.xyz">
                        </div>
                        <div class="group">
                            <label for="phone" class="label">Phone Number</label>
                            <input type="text" id="phone" name="phone"  class="input" value="<?php echo $_SESSION['phone']?>" placeholder="21 234 567">
                        </div>
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
    include 'inc/footer.php';
?>
