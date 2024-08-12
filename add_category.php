<?php
include_once "header.php";
if (isset($_SESSION['email'])) {
    //store
    $email = $_SESSION['email'];
} else {
    //url redirection
    echo "<script>window.location.assign('admin_login.php?msg=Unauthenticated&status=error')</script>";
}
?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Add Educational Institute</h1>
        </div>
    </div>
    </div>
</section>
<!-- Contact Start -->
    <div class="container-xxl mt-5">
        <div class="container">
        <?php
        if (isset($_REQUEST['msg'])) {
            if ($_REQUEST['status'] == "success") {
                echo "<div class='alert alert-success'>" . $_REQUEST['msg'] . "</div>";

            } else {

                echo "<div class='alert alert-danger'>" . $_REQUEST['msg'] . "</div>";
            }
        }
        ?>
            <div class="row g-5">

                <div class="col-lg-10 mx-auto wow fadeInUp" data-wow-delay="0.1s">
                     <form method="post" enctype="multipart/form-data">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="school_name">Educational Institute</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="Educational Institute" name="school_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="Email" name="email" required id="email" onblur="checkEmail()">
                        					<span id="error_email" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label for="password">password</label>
                                    <input type="text" class="form-control" id="school_name" placeholder="Password" name="password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Photo</label>
                                    <input type="file" class="form-control" name="photo" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>City</label>
                                    <input type="text" class="form-control" required name="city">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Area</label>
                                    <input type="text" class="form-control" required name="area">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Address</label>
                                    <input type="text" class="form-control" required name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <label>Contact</label>
                                    <input type="text" class="form-control"   name="contact" id="contact" required onblur="checkContact()">
                                    <span id="error_contact" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <label>Description</label>
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary rounded-pill py-3 mb-4 w-25 px-5 mt-3" type="submit" name="submit">Submit</button>
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
if (isset($_REQUEST['submit'])) {
    $school_name = $_REQUEST['school_name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $file_name = $_FILES['photo']['name'];
    $file_tmp_name = $_FILES['photo']['tmp_name'];
    $new_name = rand() . $file_name;
    $city = $_REQUEST['city'];
    $area = $_REQUEST['area'];
    $address = $_REQUEST['address'];
    $contact = $_REQUEST['contact'];
    $description = $_REQUEST['description'];

    move_uploaded_file($file_tmp_name, "category/" . $new_name);

    include_once 'config.php';
    $query = "INSERT INTO `school`(`school_name`,`email`,`password`, `photo`, `city`,`area`,`address`,`contact`,`description`) VALUES ('$school_name','$email','$password','$new_name', '$city','$area','$address','$contact','$description')";
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        // echo "Record Inserted";
        echo "<script>window.location.assign('add_category.php?msg=Record Inserted&status=success')</script>";

    } else {
        echo mysqli_error($conn);
        // echo "Record not inserted";
        echo "<script>window.location.assign('add_category.php?msg=Try Again&status=error')</script>";
    }
}
?>