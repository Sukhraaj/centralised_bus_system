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
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Make Payment</h1>
        </div>
    </div>
    </div>
</section>
<div class="container my-3">
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
                    <label>User Email</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="user_email"  value="<?php echo $_SESSION['email']?>" readonly>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Card Number</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="card_number"  onblur="checkCard()" id="card" required>
                            <span id="error_card" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>CVV</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="cvv"onblur="checkCvv()" id="cvv" required>
                            <span id="error_cvv" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Month</label>
                        <div class="form-floating">
                            <input type="month" class="form-control"  required>
                            
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
    <script>
        function checkCvv(){
            cvv=document.getElementById('cvv').value 
            pattern_cvv=/^[0-9]{3,4}$/
            if(pattern_cvv.test(cvv)){
                document.getElementById('error_cvv').innerHTML=""
            }
            else{
                document.getElementById('cvv').value=""
                document.getElementById('error_cvv').innerHTML="Please Enter Valid cvv of three or four digits"
            }
        }
        function checkCard(){
            card=document.getElementById('card').value 
            pattern_card=/^[0-9]{16}$/
            if(pattern_card.test(card)){
                document.getElementById('error_card').innerHTML=""
            }
            else{
                document.getElementById('card').value=""
                document.getElementById('error_card').innerHTML="Please Enter Valid card number of 16 digits"
            }
        }
    </script>
<?php
include_once("footer.php");
?>
<?php
if(isset($_REQUEST['submit'])){
    $id=$_REQUEST['id'];
    include('config.php');
    $query="Update `booking` set `booking_status`='Booked' where `id`='$id'";
    $result=mysqli_query($conn,$query);
    if($result>0){
        echo "<script>window.location.assign('user_booking.php?msg=Booked Successfully & status=success')</script>";
    }
    else{
        echo "<script>window.location.assign('payment.php?msg=Please Try again &status=error&id=$id')</script>";
    }
}
?>