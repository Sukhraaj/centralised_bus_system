<?php
    include_once("header.php");
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
    }
    else{
        //url redirection
        echo "<script>window.location.assign('admin_login.php?msg=Unauthenticated&status=error')</script>";
    }
?>
<style>
.img-set{
    height:200px !important;
}
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">View Routes</h1>
        </div>
    </div>
    </div>
</section>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container-fluid">
            <div class="row g-5">
                <div class="col-lg-12 table-responsive mx-auto wow fadeInUp" data-wow-delay="0.1s">

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
                    
                    <table class="table table-striped table-hover ">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>School Name</th>
                                <th>Bus_ Number</th>
                                <th>From Route</th>
                                <th>Fees</th>
                                <th>To route</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $count =1;
                           include_once("config.php");
                           $query = "SELECT routes.*,school.school_name,bus.bus_number FROM `routes`
                           inner join school
                           on routes.school=school.id
                           inner join bus
                           on routes.bus_number=bus.id";
                           $res = mysqli_query($conn,$query);
                           while($data = mysqli_fetch_array($res))
                            {
                           ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>
                                <?php echo $data["school_name"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["bus_number"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["from_route"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["fees"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["to_route"]; ?>    
                                </td>
                                <td>
                                <?php echo $data["description"]; ?>    
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
    include_once("footer.php");
?>