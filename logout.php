<?php 
session_start();
if(isset($_SESSION['email']))
{
    unset($_SESSION['email']);
    echo "<script>window.location.assign('admin_login.php?msg=Logout succesffuly&status=success')</script>";
}
?>