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
        <h1 class="mb-2 bread">Booking History</h1>
        </div>
    </div>
    </div>
</section>
    <!-- Contact Start -->
    <div class="container-xxl my-5">
        <div class="container-fluid">
            <div class="row g-5">
                <div class="col-lg-12 mx-auto wow fadeInUp table-responsive" data-wow-delay="0.1s">

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
                    
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>School Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $count =1;
                           include_once("config.php");
                           $query = "SELECT booking.*, routes.from_route, routes.to_route from `booking` inner join `routes` on booking.route=routes.id where booking.user='$_SESSION[email]' and booking.booking_status='Booked'";
                           $res = mysqli_query($conn,$query);
                           while($data = mysqli_fetch_array($res))
                            {
                           ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>
                                <?php echo $data["school"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["from_route"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["to_route"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["started_on"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["end_on"]; ?>    
                                </td>
                                <td>
                                ₹<?php echo $data["amount"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["booking_status"]; ?>    
                                </td>
                            </tr>
                            <?php
                            $count++;
                            }
                            ?>
                        </tbody>
                    </table>
                            
                    
                </div>
               
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
    include_once("footer.php");
?>