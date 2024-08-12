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
        <h1 class="mb-2 bread">User Register</h1>
        </div>
    </div>
    </div>
</section>
	<!--/banner-->
	<div class="banner-inner" id="home">
		<!-- banner-text -->
		<div class="container">
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
			<div class="row">
				<div class="col-md-10 mx-auto my-5 text-dark">
					<form  method="post">
						<div class="contact-form">
							<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<label>Username</label>
											<input type="text" name="name" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label>Email</label>
											<input type="text" name="email" class="form-control"  required id="email" onblur="checkEmail()">
                        					<span id="error_email" class="text-danger"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Password</label>
											<input type="password" name="password" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label>Contact</label>
											<input type="text" name="contact" class="form-control" id="contact" required onblur="checkContact()">
                        				<span id="error_contact" class="text-danger"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Address</label>
											<input type="text" name="address" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label>Gender</label>
											<br/>
											<input type="radio" required name="gender"value="male" >&nbsp; &nbsp;Male
											<input type="radio" required name="gender"  value="female"> &nbsp; &nbsp;Female
										</div>
										<div class="col-md-6">
											<label>City</label>
											<input type="text" name="city" class="form-control" required>
										</div>
										<div class="col-md-6">
											<label>Area</label>
											<input type="text" name="area" class="form-control" required>
										</div>
										
								</div>
								<div class="d-flex justify-content-center">
									<button  class="btn btn-primary my-5 outline  rounded-pill w-25 py-3" name="submit">submit</button>

								</div>
							</div>
										
						</div>  
					</div>  

					</form>
				

		


				</div>
			</div>
			<script>
        function checkContact(){
            contact=document.getElementById('contact').value 
            pattern_contact=/^[6-9]{1}[0-9]{9}$/
            if(pattern_contact.test(contact)){
                document.getElementById('error_contact').innerHTML=""
            }
            else{
                document.getElementById('contact').value=""
                document.getElementById('error_contact').innerHTML="Please Enter Valid Contact"
            }
        }
        function checkEmail(){
            email=document.getElementById('email').value
            // console.log(email)
            pattern_email=/^[a-zA-Z0-9/./-/_]+\@+[a-zA-Z0-9]+\.+[a-zA-Z]{2,3}$/
            if(pattern_email.test(email)){
                console.log('valid')
                document.getElementById('error_email').innerHTML=""
            }
            else{
                console.log('invalid')
                document.getElementById('email').value=""
                document.getElementById('error_email').innerHTML="Please Enter Valid email"
            }
        }
    </script>
	<?php
    if(isset($_REQUEST['submit']))
    {
        $username = $_REQUEST['name'];
		$email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $contact = $_REQUEST['contact'];
		$address=$_REQUEST['address'];
		$city=$_REQUEST['city'];
		$area=$_REQUEST['area'];
		$gender=$_REQUEST['gender'];

        include_once('config.php');
        $query = "INSERT INTO `user`( `name`, `email`, `password`, `contact`, `address`, `city`, `area`,`gender`) VALUES ('$username','$email','$password','$contact','$address','$city','$area','$gender')";
        $result = mysqli_query($conn,$query);
             if($result>0)
                 {
                     echo "Record Inserted";
                     echo "<script>window.location.assign('user_register.php?msg=Record Inserted&status=success')</script>";

                  }
             else{
                      //echo mysqli_error($conn);
                    echo "Record not inserted";
                    echo "<script>window.location.assign('user_register.php?msg=Try Again&status=error')</script>";
        
        }
    }
?>

					
<?php
	include_once("footer.php");
	?>
</body>
</html>
	