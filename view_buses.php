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
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2  mb-4 animated slideInDown">View Schools</h1>
           
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8 mx-auto wow fadeInUp" data-wow-delay="0.1s">

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
                    
                    <table class="table table-striped table-hover table-primary">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Bus Number</th>
                                <th>Photo</th>
                                <th>Quantity_slot</th>
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
                                <img src="category/<?php echo $data['photo']?>" alt="" class="img-fluid img-set" >
                                </td>
                                <td>
                                <?php echo $data["quantity_slot"]; ?>    
                                </td>
                                <!-- <td>
                                    <a href="edit_category.php?id=<?php echo $data['id']; ?>">
                                        <i class="fa fa-edit text-info"></i>
                                    </a>


                                    <a href="delete_category.php?id=<?php echo $data['id']?>">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td> -->
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