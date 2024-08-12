<?php
    include_once("user_header.php");
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
        include('config.php');
        $res=mysqli_query($conn,"select * from `user` where email='$_SESSION[email]'");
        $data=mysqli_fetch_array($res);
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
        <h1 class="mb-2 bread">Update Profile</h1>
        </div>
    </div>
    </div>
</section>
    <!-- Contact Start -->
    <div class="container-xxl my-5">
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
            <div class="row g-5">
           
                <div class="col-lg-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                <form  method="post">
						<div class="contact-form">
							<div class="form-group">
								<!-- <h3 align="center">Update Profile </h3> -->
									<div class="row">
										<div class="col-md-6">
											<label>Username</label>
											<input type="text" name="name" class="form-control" value="<?php echo $data['name']?>" required>
										</div>
										<div class="col-md-6">
											<label>Email</label>
											<input type="text" name="email" class="form-control" value="<?php echo $data['email']?>"  required id="email" onblur="checkEmail()">
                                            <span id="error_email" class="text-danger"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Password</label>
											<input type="password" name="password" class="form-control" value="<?php echo $data['password']?>" required>
										</div>
										<div class="col-md-6">
											<label>Contact</label>
											<input type="text" name="contact" class="form-control" value="<?php echo $data['contact']?>" required id="contact" onblur="checkContact()">
                        <span id="error_contact" class="text-danger"></span>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Address</label>
											<input type="text" name="address" class="form-control" value="<?php echo $data['address']?>" required>
										</div>
										<div class="col-md-6">
											<label>Gender</label>
											<br/>
                                            <?php
                                            if($data['gender']=='male'){
                                            ?>
											<input type="radio" name="gender" value="male" checked required>&nbsp; &nbsp;Male
											<input type="radio" name="gender" value="female" required> &nbsp; &nbsp;Female
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                            <input type="radio" name="gender" value="male" required>&nbsp; &nbsp;Male
											<input type="radio" name="gender" value="female" checked required> &nbsp; &nbsp;Female
                                                <?php
                                            }?>
										</div>
										<div class="col-md-6">
											<label>City</label>
											<input type="text" name="city" class="form-control" required value="<?php echo $data['city']?>">
										</div>
										<div class="col-md-6">
											<label>Area</label>
                                            <input type="text" name="area" class="form-control"required value="<?php echo $data['area']?>">
											<input type="hidden" name="id" class="form-control"required value="<?php echo $data['id']?>">
										</div>
										
								</div>
								<div class="d-flex justify-content-center">
									<button  class="btn btn-primary my-5 outline  rounded-pill w-25" name="submit">submit</button>

								</div>
							</div>
										
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
		$id=$_REQUEST['id'];
        include_once('config.php');
        $query = "Update `user` set `name`='$username',`email`='$email', `password`='$password',`contact`='$contact',`address`='$address',`city`='$city',`area`='$area',`gender`='$gender' where `id`='$id'";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('update_profile.php?msg=Record Updated&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('update_profile.php?msg=Try Again&status=error')</script>";
        }
    }
?>
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