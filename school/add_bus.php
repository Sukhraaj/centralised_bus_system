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
        <h1 class="mb-2 bread">Add Bus</h1>
        </div>
    </div>
    </div>
</section>

<div class="container mt-3">
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
                    <label for="school_name">Bus Number</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="school_name" placeholder="Bus Number" required name="bus_number">
                    
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label>Photo</label>
                        <div class="form-floating">
                            <input type="file" class="form-control" name="photo" required>
                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label>Slot</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" required name="quantity_slot">
                            
                        </div>
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-primary rounded-pill py-3 px-3 w-25 my-3" type="submit" name="submit">Submit</button>
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
        $bus_number = $_REQUEST['bus_number'];
        $file_name = $_FILES['photo']['name'];
        $file_tmp_name = $_FILES['photo']['tmp_name'];
        $new_name = rand().$file_name;
        move_uploaded_file($file_tmp_name,"buses/".$new_name);
        $quantity_slot = $_REQUEST['quantity_slot'];

        include_once('config.php');
        $query = "INSERT INTO `bus`(`bus_number`,`photo`,`quantity_slot`) VALUES ('$bus_number','$new_name', '$quantity_slot')";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('add_bus.php?msg=Record Inserted&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('add_bus.php?msg=Try Again&status=error')</script>";
        }
    }
?>
 