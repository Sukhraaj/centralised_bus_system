<?php
    include_once("school_header.php");
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">School Login</h1>
        </div>
    </div>
    </div>
</section>

    <!-- Contact Start -->
    <div class="container-xxl mt-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">

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
                                    <label for="email">Your Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Your Email"  required name="email">
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <label for="password">Your password</label>
                                    <input type="password" class="form-control" id="password" required placeholder="Your password" name="password">
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary rounded-pill py-3 mb-4 w-25 px-5 mt-5" type="submit" name="submit">Submit</button>
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
        $query = "select * from school where email='$email' and password='$password'";
        $result = mysqli_query($conn,$query);
        if($row = mysqli_fetch_array($result))
        {
            //create session 
            $_SESSION['email'] = $email;

            // echo "Record Inserted";
            echo "<script>window.location.assign('welcome.php?msg=Record Inserted&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('school_login.php?msg=Invalid email or password&status=error')</script>";
        
        }
    }
?>