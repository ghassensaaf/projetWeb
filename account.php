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
    <h3>My Account</h3>
    <form action="">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" value="<?php echo $_SESSION['name'] ?>"></td>
            </tr>
            <tr>
                <td>email</td>
                <td><input type="email" value="<?php echo $_SESSION['email'] ?>"></td>
            </tr>
        </table>
    </form>
</main>

<?php
    include 'inc/footer.php';
?>
