<?php
    include_once("user_header.php");
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
    }
    // else{
    //     //url redirection
    //     echo "<script>window.location.assign('user_login.php?msg=Unauthenticated&status=error')</script>";
    // }
?>
<style>
.img-set{
    height:200px !important;
}
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">View Schools</h1>
        </div>
    </div>
    </div>
</section>

    <div class="container my-4">
        <div class="row">
        <?php
            $count =1;
            include_once("config.php");
            $query = "SELECT * FROM `school`";
            $res = mysqli_query($conn,$query);
            while($data = mysqli_fetch_array($res))
            {
            ?>
            <div class="col-md-4">
                <div class="card" style="height:430px;">
                    <img src="category/<?php echo $data['photo']?>" alt="" class="img-fluid img-set" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $data["city"]; ?></h5>
                        <p class="card-text "><?php echo $data["description"]; ?></p>
                        <a href="#" class=""><?php echo $data["school_name"]; ?></a><br>
                        <a href="selectroute.php?id=<?php echo $data['id'];?>" class="btn btn-primary">Choose Route</a>
                    </div>
                </div>
            </div>
    <?php
    $count++;
    }
    ?>
    </div>
</div>

   

<?php
    include_once("footer.php");
?>