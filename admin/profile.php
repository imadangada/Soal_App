<?php require_once "../assets/includes/config.php"; ?>
<?php
session_start();
include "../assets/includes/db_con.php";
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
}elseif($_SESSION['user_type'] != 1) {
    header("location:../logout.php");
}else{
    if(isset($_POST['submit']))
    {
      $adminid=$_SESSION['user_id'];
      $name=$_POST['name'];
    
    
       $query=mysqli_query($con, "update users set name ='$name' where user_id='$adminid'");
      if ($query) {
      echo "<script>alert('Admin profile has been updated.')</script>";
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

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sooal 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php } ?>