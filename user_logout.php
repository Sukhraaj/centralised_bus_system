<?php
session_start();
//session destroy
unset($_SESSION['email']);
echo "<script>window.location.assign('user_login.php?msg=Logout Successfully')</script>";
?>