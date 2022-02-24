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
     $msg="";
      $name=$_POST['name'];
      $password=md5($_POST['password']);
      $login_id=$_POST['login_id'];
      $ret=mysqli_query($con, "select login_id from users where login_id='$login_id'");
      $result=mysqli_fetch_array($ret);
      if($result>0){
  echo "<script>alert('This email is already associated with another account')<script>";
      }
      else{
      $query=mysqli_query($con, "insert into users(name,password,login_id,user_status) value('$name','$password','$login_id','2')");
      if ($query) {
        echo "<script>alert('You have successfully registered new ulama'a')</script>";
    }
    else
      {
        echo "<script>alert('Something Went Wrong. Please try again')</script>";
      }
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
                        <h1 class="h3 mb-0 text-gray-800">Register New Ulama'a</h1>
                       
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
                                    <h6 class="m-0 font-weight-bold text-primary">Register New Ulama'a</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <main class="page registration-page" style="margin-top: 0px;">
        <section class="clean-block clean-form">


                <form action="add-u.php" method="post">
                
                    <div class="form-group"><label for="name">Name</label>
                    <input class="form-control item" type="text" id="name" name="name" ></div>
                    <div class="form-group"><label for="password">Password</label>
                    <input class="form-control item" type="password" id="password" name="password"></div>
                    <div class="form-group"><label for="Confirm Password">Confirm Password</label>
                    <input class="form-control item" type="password" id="confirm_password" name="cpassword"></div>
                    <script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

</script>
                    <div class="form-group"><label for="email">Email or Phone Number</label>
                    <input class="form-control item" type="email" id="email" name="login_id"></div>
                    <button class="btn btn-primary btn-block" style="background-color:#074954; border-color: aliceblue;" type="submit" name="submit">Sign Up</button>
                    </form>
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