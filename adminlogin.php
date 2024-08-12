<?php
    include_once("header.php");
?>
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Admin Login</h1>
           
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay="0.1s">

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

                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required>
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" placeholder="Your password" name="password" required>
                                    <label for="password">Your password</label>
                                </div>
                            </div>
                           
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
    include_once("footer.php");
?>

<?php
    if(isset($_REQUEST['submit']))
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
       
        include_once('config.php');
        $query = "select * from admin_login where email='$email' and password='$password'";
        $result = mysqli_query($conn,$query);
        if($row = mysqli_fetch_array($result))
        {
            //create session 
            $_SESSION['email'] = $email;

            // echo "Record Inserted";
            echo "<script>window.location.assign('admin_welcome.php?msg=Record Inserted&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('adminlogin.php?msg=Invalid email or password&status=error')</script>";
        
        }
    }
?>