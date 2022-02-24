<?php require_once "../assets/includes/config.php"; ?>
<?php
session_start();
include "../assets/includes/db_con.php";
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
}elseif($_SESSION['user_type'] != 1) {
    header("location:../logout.php");
}else{
?>
<?php include 'sidebar.php';?>

<?php include 'topbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Sooal Dashboard</h1>
                        <a href="add-a.php" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                                class="fas fa-download fa-user-circle text-white-50"></i> Register New Admin</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php 
$rtp =mysqli_query($con ,"SELECT user_id from users where user_status= '3'");
$penapp=mysqli_num_rows($rtp);
?>
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Users Registered</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $penapp;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php 
$yui =mysqli_query($con ,"SELECT user_id from users where user_status= '2'");
$selapp=mysqli_num_rows($yui);
 ?>
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Ulama'a Registered</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $selapp;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php 
$poi =mysqli_query($con ,"SELECT user_id from users where user_status= '1'");
$rejapp=mysqli_num_rows($poi);
?>
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Admin Registered</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rejapp;?></div>
                                        </div>
                                              
                                        <div class="col-auto">
                                            <i class="fas fa-user-circle fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                        <?php 
$poi =mysqli_query($con ,"SELECT p_id from preachs");
$pr=mysqli_num_rows($poi);
?>
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Total Preach posted</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $pr;?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-microphone fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Activities Analysis</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    Queastion Asked Analysis
                                    <hr bgcolor="#4e73df">
                                <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="card bg-primary text-white shadow">
                                        <div class="card-body">
                                        <?php 
$poi =mysqli_query($con ,"SELECT q_id from questions");
$q=mysqli_num_rows($poi);
?>
                                            Total question Asked 
                                            <div class="text-white-50 small"><?php echo $q; ?></div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 mb-4">
                                    <div class="card bg-success text-white shadow">
                                        <div class="card-body">
                                        <?php 
                                $year = date("Y");
                                $previousyear = $year -1;
$poi =mysqli_query($con ,"SELECT q_id from questions  WHERE EXTRACT(year FROM date_ask) ='$previousyear'");
$qy=mysqli_num_rows($poi);
?>
                                            Total question Asked on <?php echo $previousyear; ?>
                                            <div class="text-white-50 small"><?php echo $qy; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="card bg-info text-white shadow">
                                        <div class="card-body">
                                        <?php 
                                $year = date("m");
                                $month = date("F");
$poi =mysqli_query($con ,"SELECT q_id from questions  WHERE EXTRACT(month FROM date_ask) ='$year'");
$qm=mysqli_num_rows($poi);
?>
                                            Total question Asked on <?php echo $month; ?>
                                            <div class="text-white-50 small"><?php echo $qm; ?></div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                Preach Posted Analysis
                                    <hr bgcolor="#4e73df">
                                <div class="row">
                                <div class="col-lg-4 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body">
                                        <?php 
$poi =mysqli_query($con ,"SELECT id from likes");
$l=mysqli_num_rows($poi);
?>
                                            Total Preach Likes
                                            <div class="text-white-50 small"><?php echo $l; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="card bg-danger text-white shadow">
                                        <div class="card-body">
                                        <?php 
                                $year = date("Y");
                                $previousyear = $year -1;
$poi =mysqli_query($con ,"SELECT id from likes WHERE EXTRACT(year FROM date) ='$previousyear'");
$ly=mysqli_num_rows($poi);
?>
                                            Total Preach Likes on <?php echo $previousyear; ?>
                                            <div class="text-white-50 small"><?php echo $ly; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <div class="card bg-secondary text-white shadow">
                                        <div class="card-body">
                                        <?php 
                                $year = date("m");
                                $month = date("F");
$poi =mysqli_query($con ,"SELECT id from likes  WHERE EXTRACT(month FROM date) ='$year'");
$lm=mysqli_num_rows($poi);
?>
                                            Total Preach Likes on <?php echo $month; ?>
                                            <div class="text-white-50 small"><?php echo $lm; ?></div>
                                        </div>
                                    </div>
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