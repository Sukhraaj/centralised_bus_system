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
<style>
.img-set{
    height:200px !important;
    width: 250px !important;
}
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Manage Educational Institute</h1>
        </div>
    </div>
    </div>
</section>
    <!-- Contact Start -->
    <div class="container-xxl mt-5">
        <div class="container-fluid">
            <div class="row g-5">
                <div class="col-lg-12 mx-auto wow table-responsive fadeInUp" data-wow-delay="0.1s">

                    <?php
if (isset($_REQUEST['msg'])) {
    if ($_REQUEST['status'] == "success") {
        echo "<div class='alert alert-success'>" . $_REQUEST['msg'] . "</div>";

    } else {

        echo "<div class='alert alert-danger'>" . $_REQUEST['msg'] . "</div>";
    }
}
?>

                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Educational Institute Name</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>city</th>
                                <th>Area</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
$count = 1;
include_once "config.php";
$query = "SELECT * FROM `school`";
$res = mysqli_query($conn, $query);
while ($data = mysqli_fetch_array($res)) {
    ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>
                                <?php echo $data["school_name"]; ?>
                                </td>
                                <td>
                                <?php echo $data["email"]; ?>
                                </td>
                                <td>
                                <img src="category/<?php echo $data['photo'] ?>" alt="" class=" img-set" >
                                </td>
                                <td>
                                <?php echo $data["city"]; ?>
                                </td>
                                <td>
                                <?php echo $data["area"]; ?>
                                </td>
                                <td>
                                <?php echo $data["address"]; ?>
                                </td>
                                <td>
                                <?php echo $data["contact"]; ?>
                                </td>
                                <td>
                                <?php echo $data["description"]; ?>
                                </td>
                                <td>
                                    <a href="edit_category.php?id=<?php echo $data['id']; ?>">
                                        <i class="fa fa-edit text-info"></i>
                                    </a>


                                    <a href="delete_category.php?id=<?php echo $data['id'] ?>">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php
$count++;
}
?>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php
include_once "footer.php";
?>