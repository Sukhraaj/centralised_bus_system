<?php
	include("school_header.php");
    if(!isset($_SESSION["email"]))
    {
        echo "<script>window.location.assign('school_login.php')</script>";
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
        <h1 class="mb-2 bread">Add Routes</h1>
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
                       <label>Select Educational Institute</label>
                       <select class="form-control select-tabs" required name="school_name" required>
                                    <br><option value="" selected disabled> Select Educational Institute</option>
                                    
                                    <?php
                                        $obj=mysqli_connect("localhost","root","","centralized_school_bus");

                                        $query = "SELECT * FROM `school`";
                                        $result = mysqli_query($obj,$query);
                                        while($data = mysqli_fetch_array($result))
                                        {
                                            if($_SESSION["email"] == $data['email'])
                                            {
                                                echo "<option value='$data[id]' selected>".$data['school_name']."</option>";
                                            }
                                            else{
                                                echo "<option value='$data[id]' disabled>".$data['school_name']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                       </div>
                       <div class="col-md-6">
                       <label>Bus Number</label>
                       <select class="form-control select-tabs" name="bus_number" required>
                                    <br><option value="" selected disabled> Select Bus_Number</option>
                                    
                                    <?php
                                        $obj=mysqli_connect("localhost","root","","centralized_school_bus");

                                        $query = "SELECT * FROM `bus`";
                                        $result = mysqli_query($obj,$query);
                                        while($data = mysqli_fetch_array($result))
                                        
                                        {
                                            {
                                                echo "<option value='$data[id]'>".$data['bus_number']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                       </div>
                       <div class="col-md-6">
                            <label>From Route</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" required name="from_route" >
                               
                           </div>
                       </div>
                      
                       <div class="col-md-6">
                            <label>To Route</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" required name="to_route" >
                               
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>Fees</label>
                           <div class="form-floating">
                               <input type="text" class="form-control" required name="fees">
                               
                           </div>
                       </div>
                       <div class="col-md-6">
                         <label>Description <small>(Route Path)</small></label>
                           <div class="form-floating">
                               <input type="text" class="form-control" required name="description"> 
                           </div>
                       </div>
                       </div><br>
                       <div class="d-flex justify-content-center">
                           <button class="btn btn-primary rounded-pill py-3 px-3 w-25 mb-3" type="submit" name="submit">Submit</button>
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
        $school_name = $_REQUEST['school_name'];
        $bus_number = $_REQUEST['bus_number'];
        $from_route = $_REQUEST['from_route'];
        $fees = $_REQUEST['fees'];
        $to_route = $_REQUEST['to_route'];
        $description = $_REQUEST['description'];

        include_once('config.php');
        $query = "INSERT INTO `routes`(`school`,`bus_number`,`from_route`,`fees`,`to_route`,`description`) VALUES ('$school_name','$bus_number','$from_route', '$fees','$to_route','$description')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('add_route.php?msg=Record Inserted&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('add_route.php?msg=Try Again&status=error')</script>";
        }
    }
?>
 