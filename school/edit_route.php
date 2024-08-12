<?php
    include_once("school_header.php");
?>
<?php
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    include_once("config.php");
    $query = "select * from routes where id='$id'";
    $res = mysqli_query($conn,$query);
    if($row = mysqli_fetch_array($res))
    {
        $cs = $row['school'];
        $cbn = $row['bus_number'];
        $cfr = $row['from_route'];
        $cfe = $row['fees'];
        $ct = $row['to_route'];
        $cd = $row['description'];
    }
}
else{
    //url redirect
    echo "<script>window.location.assign('view_bus.php')</script>";
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Edit Routes</h1>
        </div>
    </div>
    </div>
</section>
    <!-- Contact Start -->
    <div class="container-xxl mt-5">
        <div class="container-fluid">
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

                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="school_name" value="<?php echo $cs; ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                <label for="">School Name</label>
                                <select class="form-control select-tabs" name="school_name" required>
                                    <br><option value=""  disabled> Select School</option>
                                    
                                    <?php
                                        $obj=mysqli_connect("localhost","root","","centralized_school_bus");

                                        $query = "SELECT * FROM `school`";
                                        $result = mysqli_query($obj,$query);
                                        while($data = mysqli_fetch_array($result))
                                        {
                                            if($_SESSION["email"] == $data["email"])
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
                            </div>
                            <div class="col-md-6">
                            <label>Bus Number</label>
                       <select class="form-control select-tabs" name="bus_number" required>
                                    <br><option value=""  disabled> Select Bus_Number</option>
                                    
                                    <?php
                                        $obj=mysqli_connect("localhost","root","","centralized_school_bus");

                                        $query = "SELECT * FROM `bus`";
                                        $result = mysqli_query($obj,$query);
                                        while($data = mysqli_fetch_array($result))
                                        
                                        {
                                            {
                                                echo "<option value='$data[id]' if($data[id]==$cbn){ selected }>".$data['bus_number']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                       
                       </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>from route</label>
                                    <input type="text" class="form-control" name="from_route"value="<?php echo $cfr; ?>" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>To Route</label>
                                    <input type="text" class="form-control" name="to_route" value="<?php echo $ct; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Fees</label>
                                    <input type="text" class="form-control" name="fees" value="<?php echo $cfe; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" value="<?php echo $cd; ?>">
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary rounded-pill py-3 mb-3 w-25 px-3 mt-3" type="submit" name="submit">Submit</button>
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
        $id = $_REQUEST['id'];
        $school_name = $_REQUEST['school_name'];
        $bus_number = $_REQUEST['bus_number'];
        $from_route = $_REQUEST['from_route'];
        $fees = $_REQUEST['fees'];
        $to_route = $_REQUEST['to_route'];
        $description = $_REQUEST['description'];

        include_once('config.php');
        
        $query = "UPDATE `routes` SET `school`='$school_name',`bus_number`='$bus_number' , `from_route`='$from_route',`fees`='$fees' ,`to_route`='$to_route',`description`='$description' WHERE `id`='$id'";

        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('view_route.php?msg=Record Updated&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            // echo "<script>window.location.assign('view_route.php?msg=Try Again&status=error')</script>";
        }
    }
?>