<?php
	include("user_header.php");
    if(!isset($_SESSION["email"]))
    {
        echo "<script>window.location.assign('user_login.php')</script>";
    }
    else
    {
        $email = $_SESSION["email"];
    }
?>
   <?php
                           $route =$_REQUEST['id'];
                           include_once("config.php");
                           $query = "SELECT routes.from_route, routes.to_route,routes.bus_number,routes.fees,routes.id, bus.bus_number,bus.quantity_slot, bus.photo,school.school_name  FROM `routes` inner join `bus` on routes.bus_number=bus.id inner join `school` on routes.school=school.id where routes.id=$route ";
                           $res = mysqli_query($conn,$query);
                           $data = mysqli_fetch_array($res);
                            // print_r($data);
                           ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Booking History</h1>
        </div>
    </div>
    </div>
</section>
<div class="container mt-5">
<?php
                        if(isset($_REQUEST['msg']) )
                        {   
                            if($_REQUEST['status'] == "success")
                            {
                                echo "<div class='alert alert-success'>".$_REQUEST['msg']."</div>";

                            }
                            else{
                                
                                echo "<div class='alert alert-danger'>".$_REQUEST['msg']."</div>";
                            }
                        }
                    ?>
<div class="row g-5">
           
           <div class="col-lg-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <form method="post" enctype="multipart/form-data">
                   <div class="row g-3">
                       <div class="col-md-6">
                       <label for="school_name">Bus Number</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" id="school_name" placeholder="Bus Number" name="bus_number" value="<?php echo $data["bus_number"]; ?>" readonly>
                        
                           </div>
                       </div>
                       <div class="col-md-6">
                       <label>User Email</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" name="user_email"  value="<?php echo $_SESSION['email']?>" readonly>
                               
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>From</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" name="route" value="<?php echo $data['from_route'];?>" readonly>
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>To</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" name="route" value="<?php echo $data['to_route'];?>" readonly>
                               <input type="hidden" class="form-control" name="route_id" value="<?php echo $data['id'];?>">
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>School</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" name="school_name" value="<?php echo $data['school_name']?>" readonly>
                               
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>Amount</label>
                           <div class="form-floating">
                               <input type="number" class="form-control" name="amount" value="<?php echo $data['fees']?>" readonly>
                               
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>Start Date</label>
                           <div class="form-floating">
                               <input type="date" class="form-control"  required name="start">
                               
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>End Date</label>
                           <div class="form-floating">
                               <input type="date" class="form-control" required name="end">
                               
                           </div>
                       </div>
                       </div><br>
                       <div class="d-flex justify-content-center">
                           <button class="btn btn-primary rounded-pill mb-3 w-25 py-3 px-3" type="submit" name="submit">Book</button>
                       </div>
                   </div>
               </form>
           </div>
          
       </div>
</div>
<?php
include_once("footer.php");
?>
<?php
    if(isset($_REQUEST['submit']))
    {
        $bus_number = $_REQUEST['bus_number'];
        $route_id = $_REQUEST['route_id'];
        $start=$_REQUEST['start'];
        $end=$_REQUEST['end'];
        $school=$_REQUEST['school_name'];
        $user=$_REQUEST['user_email'];
        $amount=$_REQUEST['amount'];
        include_once('config.php');
        $query = "INSERT INTO `booking`(`user`,`school`,`bus`,`route`,`amount`,`started_on`,`end_on`) VALUES ('$user','$school', '$bus_number','$route_id','$amount','$start','$end')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            $quantity=$data['quantity_slot']-1;
             $query2="UPDATE `bus` set `quantity_slot`='$quantity'where `bus_number`='$bus_number'";
            $res2=mysqli_query($conn,$query2);
            if($res2>0){
                $result_id=mysqli_query($conn,"SELECT * from `booking` order by `id` desc limit 1 ");
                $data_id=mysqli_fetch_array($result_id);
                echo "<script>window.location.assign('payment.php?msg=Please Make Payment to Proceed&status=success&id=$data_id[id]')</script>";
            }
            // echo "Record Inserted";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('user_bookingdetail.php?msg=Try Again&status=error?id=$_REQUEST[route_id]')</script>";
        }
    }
?>
 