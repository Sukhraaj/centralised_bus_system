<?php
include_once "header.php";
?>
<?php
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    include_once "config.php";
    $query = "select * from school where id='$id'";
    $res = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_array($res)) {
        $cn = $row['school_name'];
        $ce = $row['email'];
        $cp = $row['password'];
        $ci = $row['photo'];
        $cc = $row['city'];
        $ca = $row['area'];
        $caa = $row['address'];
        $ccc = $row['contact'];
        $cd = $row['description'];
    }
} else {
    //url redirect
    echo "<script>window.location.assign('manage_category.php')</script>";
}
?>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Edit Educational Institute</h1>
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
if (isset($_REQUEST['msg'])) {
    if ($_REQUEST['status'] == "success") {
        echo "<div class='alert alert-success'>" . $_REQUEST['msg'] . "</div>";

    } else {

        echo "<div class='alert alert-danger'>" . $_REQUEST['msg'] . "</div>";
    }
}
?>

                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="old_image" value="<?php echo $ci; ?>">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="School_name">School Name</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="School Name" name="school_name" value="<?php echo $cn; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="School_name">Email</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="School Name" name="email" value="<?php echo $ce; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="School_name">Password</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="School Name" name="password" value="<?php echo $cp; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">

                                    <label>School image</label>
                                    <input type="file" class="form-control" name="photo" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" value="<?php echo $cc; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Area</label>
                                    <input type="text" class="form-control" name="area" value="<?php echo $ca; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="<?php echo $caa; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Contact</label>
                                    <input type="text" class="form-control" name="contact" value="<?php echo $ccc; ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" value="<?php echo $cd; ?>">
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary rounded-pill py-3 px-5 mt-4 mx-auto d-block" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
include_once "footer.php";
?>

<?php
if (isset($_REQUEST['submit'])) {
    $id = $_REQUEST['id'];
    $school_name = $_REQUEST['school_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if ($_FILES['photo']['name']) {
        $file_name = $_FILES['photo']['name'];
        $file_tmp_name = $_FILES['photo']['tmp_name'];
        $new_name = rand() . $file_name;

        move_uploaded_file($file_tmp_name, "category/" . $new_name);
    } else {
        $new_name = $_REQUEST['old_image'];
    }
    $city = $_REQUEST['city'];
    $area = $_REQUEST['area'];
    $address = $_REQUEST['address'];
    $contact = $_REQUEST['contact'];
    $description = $_REQUEST['description'];

    include_once 'config.php';
    $query = "UPDATE `school` SET `school_name`='$school_name',`email` = '$email',`password`='$password',`photo`='$new_name' , `city`='$city',`area`='$area',`address`='$address',`contact`='$contact', `description`='$description' WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        // echo "Record Inserted";
        echo "<script>window.location.assign('manage_category.php?msg=Record Updated&status=success')</script>";

    } else {
        echo mysqli_error($conn);
        // echo "Record not inserted";
        echo "<script>window.location.assign('manage_category.php?msg=Try Again&status=error')</script>";
    }
}
?>