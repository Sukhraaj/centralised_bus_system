<?php
if(isset($_REQUEST['id']))
{
    $id = $_REQUEST['id'];
    include_once("config.php");
    $query = "select * from school where id='$id'";
    $res = mysqli_query($conn,$query);
    if($row = mysqli_fetch_array($res))
    {
        $n = $row['school_name'];
        $e = $row['photo'];
        $c = $row['city'];
        $a = $row['area'];
        $d = $row['address'];
        $t = $row['contact'];
        $d = $row['description'];
        
    }
}
else{
    //url redirect
    echo "<script>window.location.assign('admin_view_user.php')</script>";
}
?>

<?php
    include_once("header.php");
?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4 animated slideInDown">Edit Profile</h1>
           
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 mx-auto wow fadeInUp" data-wow-delay="0.1s">

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

                    <form method="post">

                    <input type="hidden" name="id"  value="<?php echo $id; ?>">

                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="School Name" name="school_name" value="<?php echo $n; ?>">
                                    <label for="name">School Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="number" class="form-control" id="contact" placeholder="Your Contact" name="contact"  value="<?php echo $c; ?>">
                                    <label for="contact">Your Contact</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email" name="email"  value="<?php echo $e; ?>">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5" type="submit" name="submit">Update</button>
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
        $name = $_REQUEST['school_name'];
        $email = $_REQUEST['email'];
        $id = $_REQUEST['id'];
        $contact = $_REQUEST['contact'];

        include_once('config.php');
        $query = "update register set name='$name', email='$email', contact='$contact' where id='$id'";
        $result = mysqli_query($conn,$query);
        if($result>0)
        {
            echo "<script>window.location.assign('admin_view_user.php?msg=Record Updated&status=success')</script>";

        }
        else{
            echo mysqli_error($conn);
            // echo "Record not inserted";
            echo "<script>window.location.assign('admin_view_user.php?msg=Try Again&status=error')</script>";
        
        }
    }
?>