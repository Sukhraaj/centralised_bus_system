<?php
include_once("user_header.php");
if(!isset($_SESSION["email"]))
    {
        echo "<script>window.location.assign('user_welcome.php')</script>";
    }
    else
    {
        $email = $_SESSION["email"];
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