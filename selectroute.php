<?php
include "user_header.php";
	?>
<!--contact start here-->
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Select Route</h1>
        </div>
    </div>
    </div>
</section>

<div class="contact">
	<div class="container mt-5">
		<div class="contact-main">
			<div class="contact-top">
				<!-- <h2 class="text-center my-3">Route Confirm</h2> -->
			</div>
			<div class="contact-bottom">
				<div class="col-md-10  offset-md-1 contact-left">
					
					<form action="user_viewbus.php" method="post">
						<div class="row">
							<div class="col-md-6">
								<label> Select From</label>
								<select name="from" class="form-control">
									<?php
									include("config.php");
									$id=$_REQUEST['id'];
									$q= "select * from routes where school='$id'";
									$result = mysqli_query($conn,$q);
									while($row = mysqli_fetch_array($result))
									{
									echo "<option>$row[from_route]</option>";
									}  
									?>								
								</select>

							</div>
							<div class="col-md-6">
							<label> Select To</label>
							<select name="to" class="form-control">
							<?php
							include("config.php");
							$id=$_REQUEST['id'];
							$q= "select * from routes where school='$id'";
							$result = mysqli_query($conn,$q);
							while($row = mysqli_fetch_array($result))
							{
							echo "<option>$row[to_route]</option>";
							}  
							?>							
							</select>
							</div>
						</div>
						
	<div class="d-flex justify-content-center">
    	<button type="submit" name="btn" class="btn btn-primary mb-4">View Buses</button>
	</div>
	</form>
				</div>
			  <div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--contact end here-->
<!--map start here-->
<div class="map">
  
</div>
<!--map end here-->
<?php
include "footer.php";
	?>