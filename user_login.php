<?php
	include("user_header.php");
	if(isset($_SESSION["email"]))
    {
        // echo "<script>window.location.assign('welcome.php')</script>";
    }
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">User Login</h1>
        </div>
    </div>
    </div>
</section>

<div class="container-fluid">
	<div class="row background">
		<div class="col-md-6 mx-auto my-5 text-dark">
			<form  method="post">
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
				<div class="form-group">
						<div class="row">
							<div class="col-md-12">
								<label>Email</label>
								<input type="text" name="email" required class="form-control">
							</div>
							<div class="col-md-12">
								<label>Password</label>
								<input type="password" name="password" required class="form-control">
							</div>
						</div>
							<div class="col-md-12">
								<button  class="btn btn-primary my-5 mx-auto outline mx-auto d-block rounded-pill w-25 py-3" name="submit">submit</button>
							</div>
						</div>		
				</div>
			</form>
		</div>
	</div>
</div>
	<?php
    if(isset($_REQUEST['submit']))
    {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
       
        include_once('config.php');
        $query = "select * from `user` where email='$email' and password='$password'";
        $result = mysqli_query($conn,$query);
        if($row = mysqli_fetch_array($result))
        {
            //create session 
            $_SESSION['email'] = $email;

            // echo "Record Inserted";
            echo "<script>window.location.assign('user_welcome.php?msg=Record Inserted&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('user_login.php?msg=Invalid email or password&status=error')</script>";
        
        }
    }
?>
<?php
	include_once("footer.php");
	?>
</body>
</html>
	