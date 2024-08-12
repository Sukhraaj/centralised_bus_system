<?php
    include_once("school_header.php");
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
        include('config.php');
        $res=mysqli_query($conn,"select * from `school` where email='$_SESSION[email]'");
        $data=mysqli_fetch_array($res);
    }
    else{
        //url redirection
        echo "<script>window.location.assign('school_login.php?msg=Unauthenticated&status=error')</script>";
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
    <div class="container-xxl ">
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
                    <div class="d-flex justify-content-center my-4">
                    <img src="../category/<?php echo $data['photo']?>" style="height:150px; width:150px"/>
                    </div>
            <div class="row g-5">
           
                <div class="col-lg-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                     <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input type="hidden" name="old_image" value="<?php echo $data['photo']; ?>">
                                    <label for="school_name">School Name</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="School Name" name="school_name" value="<?php echo $data['school_name']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Photo</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city"  value="<?php echo $data['city']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Area</label>
                                    <input type="text" class="form-control" name="area"  value="<?php echo $data['area']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address"  value="<?php echo $data['address']?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact"  value="<?php echo $data['contact']?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description"  value="<?php echo $data['description']?>">
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary rounded-pill py-3 mb-4 w-25 px-5 mt-5" type="submit" name="submit">Update</button>
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
        $school_name = $_REQUEST['school_name'];
        if($_FILES['photo']['name'])
        {
            $file_name = $_FILES['photo']['name'];
            $file_tmp_name = $_FILES['photo']['tmp_name'];
            $new_name = rand().$file_name;
    
            move_uploaded_file($file_tmp_name,"../category/".$new_name);
        }
        else{
            $new_name = $_REQUEST['old_image'];
        }
        $city = $_REQUEST['city'];
         $area = $_REQUEST['area'];
         $address = $_REQUEST['address'];
         $contact= $_REQUEST['contact'];
         $description= $_REQUEST['description'];
         $id=$_REQUEST['id'];
        include_once('config.php');
        $query = "Update `school` set `school_name`='$school_name',`photo`='$new_name', `city`='$city',`area`='$area',`address`='$address',`contact`='$contact',`description`='$description' where `id`='$id'";
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