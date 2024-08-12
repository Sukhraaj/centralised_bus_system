<?php
    include_once("user_header.php");
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
    }
    else{
        //url redirection
        echo "<script>window.location.assign('user_login.php?msg=Unauthenticated&status=error')</script>";
    }
?>
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
<!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <div class="row">
           <?php
           if(isset($_REQUEST['btn'])){
            $from=$_REQUEST['from'];
            $to=$_REQUEST['to'];
            $count =1;
            include_once("config.php");
            $query = "SELECT routes.from_route, routes.to_route,routes.bus_number,routes.id, bus.bus_number,bus.quantity_slot, bus.photo  FROM `routes` inner join `bus` on routes.bus_number=bus.id  where routes.from_route='$from' AND routes.to_route='$to'";
            $res = mysqli_query($conn,$query);
           }else{
            $count =1;
            include_once("config.php");
            $query = "SELECT * FROM `bus`";
            $res = mysqli_query($conn,$query);
           }
                          
                           while($data = mysqli_fetch_array($res))
                            {
                           ?>
            <div class="offset-lg-1 col-lg-3 p-3">
            <div class="card" style="width: 18rem;">
    
    <img src="school/buses/<?php echo $data['photo']?>" alt="" class="img-fluid img-set" >
    <div class="card-body">

        <h5 class="card-title"><?php echo $data["bus_number"]; ?></h5>
        <p class="card-text"><?php echo $data["quantity_slot"]; ?></p>
        <?php
        if($data['quantity_slot']>=1){
        ?>
        <a href="user_bookingdetail.php?id=<?php echo $data['id'];?>" >Book Bus</a>
            <?php
        }else{
            echo "No Slot Free";
        }
            ?>
            </div>
                            </div>
                            </div>
            <?php
            $count++;
                            }
                            ?>
           
        </div>
    </div>
    <!-- Page Header End -->
  
                           
  </div>
</div>

<?php
    include_once("footer.php");
?>