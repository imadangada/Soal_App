<?php
session_start();
require_once "assets/includes/config.php";
include "assets/includes/db_con.php";
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
}elseif($_SESSION['user_type'] != 3) {
    header("location:../logout.php");
}else{
    if(isset($_POST['submit']))
    {
      $adminid=$_SESSION['user_id'];
      $name=$_POST['name'];
    
    
       $query=mysqli_query($con, "update users set name ='$name' where user_id='$adminid'");
      if ($query) {
      echo "<script>alert('Your profile has been updated.')</script>";
    }
    else
      {
        echo "<script>alert('Something Went Wrong. Please try again.')</script>";
      }
    }
    ?>
<?php include 'sidebar.php';?>

<?php include 'topbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <form name="submit" method="post" enctype="multipart/form-data"> 
  <?php
$adminid=$_SESSION['user_id'];
$ret=mysqli_query($con,"select * from users where user_id='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
       
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Admin Name                   </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="name" name="name" value="<?php  echo $row['name'];?>" type="text" required>
    </div>
</fieldset>
                   
</div>
</div>
<div class="row">
<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Email Address                 </h5>
   <div class="form-group">

   <input class="form-control white_bg" id="login_id" name="login_id" value="<?php  echo $row['login_id'];?>"  readonly='true' type="text" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>

<div class="row">

<div class="col-xl-6 col-lg-12">
 <fieldset>
  <h5>Admin Regestration date           </h5>
   <div class="form-group">
   <input class="form-control white_bg" id="date_reg" name="date_reg" value="<?php  echo $row['date_reg'];?>"  readonly='true' type="text" required>
    </div>
</fieldset>
</div>                
</div>



<?php } ?>  

<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-success btn-min-width mr-1 mb-1">Update Profile</button>
</div>
</div>
<a href="upass.php">If you want update password click here</a>
                        </div>
                    </div>
                                </div>
                            </div>
                        </div>

                       

</div>

                            <!-- Color System -->
</div>
</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          

   <?php include 'footer.php'; ?>
</body>

</html>
<?php } ?>