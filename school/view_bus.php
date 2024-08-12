<?php
    include_once("school_header.php");
    if(isset($_SESSION['email']))
    {  
        //store
        $email = $_SESSION['email'];
    }
    else{
        //url redirection
        echo "<script>window.location.assign('school_login.php?msg=Unauthenticated&status=error')</script>";
    }
?>
<style>
.img-set{
    height:200px !important;
    max-width:300px !important;
    min-width:300px !important;
}
</style>
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Manage Bus</h1>
        </div>
    </div>
    </div>
</section>
    <!-- Contact Start -->
    <div class="container-xxl py-5 mt-5">
        <div class="container-fluid">
            <div class="row g-5">
                <div class="col-lg-12 mx-auto wow fadeInUp" data-wow-delay="0.1s">

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
                                <th>Bus Number</th>
                                <th>Photo</th>
                                <th>Slot</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                           $count =1;
                           include_once("config.php");
                           $query = "SELECT * FROM `bus`";
                           $res = mysqli_query($conn,$query);
                           while($data = mysqli_fetch_array($res))
                            {
                           ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td>
                                <?php echo $data["bus_number"]; ?>    
                                </td>
                                <td>
                                <img src="buses/<?php echo $data['photo']?>" alt="" class="img-fluid img-set" >
                                </td>
                                <td>
                                <?php echo $data["quantity_slot"]; ?>    
                                </td>
                                <td>
                                    <a href="edit_bus.php?id=<?php echo $data['id']; ?>">
                                        <i class="fa fa-edit text-info"></i>
                                    </a>


                                    <a href="delete_bus.php?id=<?php echo $data['id']?>">
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
    include_once("footer.php");
?>