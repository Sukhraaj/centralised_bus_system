<?php
    include_once("school_header.php");
?>
<?php
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    include_once("config.php");
    $query = "select * from bus where id='$id'";
    $res = mysqli_query($conn,$query);
    if($row = mysqli_fetch_array($res))
    {
        $cb = $row['bus_number'];
        $ci = $row['photo'];
        $cq = $row['quantity_slot'];
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
        <h1 class="mb-2 bread">Edit Bus</h1>
        </div>
    </div>
    </div>
</section>
<!-- Contact Start -->
    <div class="container-xxl py-5">
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

                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="old_image" value="<?php echo $ci; ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="">Bus Number</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="Bus Number" name="bus_number" value="<?php echo $cb; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Bus image</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <label>Slot</label>
                                    <input type="number" class="form-control" name="quantity_slot" value="<?php echo $cq; ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-3 mx-auto d-block mt-3 w-25" type="submit" name="submit">Submit</button>
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
        $id = $_REQUEST['id'];
        $bus_number = $_REQUEST['bus_number'];

        if($_FILES['photo']['name'])
        {
            $file_name = $_FILES['photo']['name'];
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            $new_name = rand().$file_name;
    
            move_uploaded_file($file_tmp_name,"buses/".$new_name);
        }
        else{
            $new_name = $_REQUEST['old_image'];
        }
        $quantity_slot = $_REQUEST['quantity_slot'];

        include_once('config.php');
        $query = "UPDATE `bus` SET `bus_number`='$bus_number',`photo`='$new_name' , `quantity_slot`='$quantity_slot' WHERE `id`='$id'";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            // echo "Record Inserted";
            echo "<script>window.location.assign('view_bus.php?msg=Record Updated&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('view_bus.php?msg=Try Again&status=error')</script>";
        }
    }
?>