<?php 
    include_once("school_header.php");
    //check session
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
    }
    else{
        //url redirection
        echo "<script>window.location.assign('admin_login.php?msg=Unauthenticated&status=error')</script>";
    }
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Welcome <br><?php echo $email; //use session ?></h1>
        </div>
    </div>
    </div>
</section>
<?php 
    include_once("footer.php");
?>