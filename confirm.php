<?php
session_start ();
if( isset($_SESSION['name'])  && isset($_SESSION['email']))
{
    header("location:index.php");
}
else
{
    include "inc/header.php";
}
?>

    <main>
        <div class="login-wrap">
            <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Forgot Password</label>
                <input class="sign-up"><label for="tab-2" class="tab"></label>
                <div class="login-form">
                    <form class="signin" onsubmit="" action="admin/forms.php" method="post">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="login" class="text-center label">Confirmation Code</label>
                                <input style="width:30%; margin:auto; " id="login" name="code" type="text" class="input text-center" placeholder="Confirmation Code"  required>
                                <label class="text-warning label" for="login" id="login-error"></label>
                            </div>
                            <div class="group">
                                <label for="login" class="label">Password</label>
                                <input id="login" name="p1" type="password" class="input" placeholder="New Password"  required>
                                <label class="text-warning label" for="login" id="login-error"></label>
                            </div>
                            <div class="group">
                                <label for="login" class="label">Confirm Password</label>
                                <input id="login" name="p2" type="password" class="input" placeholder="Confirm Password"  required>
                                <label class="text-warning label" for="login" id="login-error"></label>
                            </div>
                            <div style="width: 50%; margin-left: 25%;" class="group text-center">
                                <input type="submit" class="button" value="Change Password">
                            </div>
                            <input type="hidden" name="form" value="changePwd">
                            <div class="hr"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </main>


<?php
include "inc/footer.php";
?>