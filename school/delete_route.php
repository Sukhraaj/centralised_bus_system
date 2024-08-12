<?php
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST["id"];
    include_once("config.php");
    $query = "DELETE FROM `routes` WHERE id='$id'";
    $res = mysqli_query($conn,$query);
    if($res>0)
    {
        echo "<script>window.location.assign('view_route.php?msg=Record Deleted&status=success')</script>";
    }
    else{
        echo "<script>window.location.assign('view_route.php?msg=Try Again&status=error')</script>";

    }
}
else
{
    //url redirect
    echo "<script>window.location.assign('admin_view_user.php')</script>";
}
?>