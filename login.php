<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Book My Bus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Transco a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link rel="stylesheet" href="css/contact.css" type="text/css" media="all">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!--<link href="css/style1.css" rel='stylesheet' type='text/css' />-->
	<link href="css/fontawesome-all.css" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700" rel="stylesheet">
	<style>
		.register-layout{
			background-color:rgba(0, 0, 0, 0.5);
		}
	</style>
</head>

<body>

	<!--/banner-->
	<div class="banner-inner" id="home">
		<!-- header -->
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light top-header">
				<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<!-- search -->
				<div class="search">
					<div class="cd-main-header">
						<ul class="cd-header-buttons">
							<li>
								<a class="cd-search-trigger" href="#cd-search">
									<span></span>
								</a>
							</li>
						</ul>
					</div>
					<div id="cd-search" class="cd-search">
						<form action="#" method="post">
							<input name="Search" type="search" placeholder="Click enter after typing...">
						</form>
					</div>
				</div>
				<!-- //search -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto">
						<li class="nav-item">
							<a class="nav-link ml-lg-0" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="gallery.php">Gallery</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								Dropdown
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item text-center" href="team.php">Team</a>
								<a class="dropdown-item text-center" href="404.php">Services</a>

							</div>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- //header -->
		<!-- banner-text -->
		<div class="wrapper-inner">
			<h3 class="logo text-center">
				<a class="navbar-brand" href="index.php">
					<i class="fas fa-cubes"></i>Book My Bus</a>
			</h3>
			<div class="row">
				<div class="col-md-6 mx-auto my-5 shadow register-layout text-light">
										<form  method="post">
											<div class="contact-form">
												<div class="form-group">
													<h3 align="center">Login </h3>
														<div class="row">
															<div class="col-md-6">
																<label>Email</label>
																<input type="text" name="email" class="form-control">
															</div>
															<div class="col-md-6">
																<label>Password</label>
																<input type="password" name="password" class="form-control">
															</div>
														</div>
														
															<div class="col-md-12">
																
																<button  class="btn btn-outline-warning my-5 mx-auto outline mx-auto d-block rounded-pill" name="submit">submit</button>
															</div>
	</div>	</div>
															
												</div>  
											</div>  
	  
										</form>
									
				
							

					
			</div>
	</div>
	<?php
    if(isset($_REQUEST['submit']))
    {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $contact = $_REQUEST['contact'];
        $email = $_REQUEST['email'];
		$school_name=$_REQUEST['school_name'];
		$school_address=$_REQUEST['school_contact'];
		$school_contact=$_REQUEST['school_address'];

        include_once('config.php');
        $query = "INSERT INTO `signup`( `username`, `password`, `contact`, `email`, `school_name`, `school_contact`, `school_address`) VALUES ('$username','$password','$contact','$email','$school_name','$school_contact','$school_address')";
        $result = mysqli_query($conn,$query);
             if($result>0)
                 {
                     echo "Record Inserted";
                     echo "<script>window.location.assign('signup.php?msg=Record Inserted&status=success')</script>";

                  }
             else{
                      //echo mysqli_error($conn);
                    echo "Record not inserted";
                    echo "<script>window.location.assign('signup.php?msg=Try Again&status=error')</script>";
        
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
					
<?php
	include_once("footer.php");
	?>
</body>
</html>
	