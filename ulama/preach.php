<?php
session_start();
require_once "../assets/includes/config.php";
require_once "../assets/includes/db_con.php";

if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 2) {
    header("location:logout.php");
} else {
if(isset($_POST['submit']))
  {
        $target_dir = "../assets/upload/";
        $target_file = $target_dir.basename($_FILES["audio"]["name"]);
        $file_size = $_FILES["audio"]["size"];
        $file_name = $_FILES["audio"]["name"];
        $temp_dir = $_FILES["audio"]["tmp_name"];
        $ext_str = "MP3,FLAC,WAV,AIFF,M4A,WMA,AAC";
        $ext = substr($file_name, strrpos($file_name, '.') + 1);
        $allowed_extensions = explode('.', $ext_str);
        if (move_uploaded_file($temp_dir , $target_file)) {
        $p_title= $_POST['p_title'];
        $preach= $_POST['preach'];
        $type = $_FILES["audio"]["type"];
        $temp = $_FILES["audio"]["tmp_name"];
        $user_id=$_SESSION['user_id'];  
$sql2="INSERT INTO preachs (ulama_id, p_title, preach, audio) VALUES('$user_id','$p_title','$preach','$file_name')";
 if($con -> query($sql2)===true){
    echo '<script>alert("Your preach was successfully posted!")</script>';
           }else{
    echo '<script>alert("Fail to upload Audio!")</script>';
      //echo"error".$sql2.$con -> error;
    }
}
}
 ?>
<!DOCTYPE html>
<html>

<head>
    <head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Preach - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="../image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="../image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="../manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>

    <style>
.my-float2{
    font-size:20px;
    margin-top:0px;
    text-align: center;
}

</style>
</head>

<body>
    <?php include 'sidebar.php'; ?>
    <?php include 'topbar.php'; ?>
   
                

<!--Action button  --

<a href="#" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
Action button  -->

          <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">New Preach</h1>
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-xl-2 col-lg-7">
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">New Preach</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body"> 

                   
            <form action="preach.php" method="post"  enctype="multipart/form-data" role="form" >
            <div class="answer">
            <div class="form-group">
            <textarea name="p_title" class="form-control" placeholder="preach title" required="required"></textarea>
        </div>
            <div class="form-group">
                <input type="file" name="audio" class="form-control file" id="audio">
            </div>
            <div class="form-group">
            <textarea name="preach" class="form-control" placeholder="Type your preach here...." required="required"></textarea> 
            <br>      
            <input type="submit" name="submit" value="Post Preach" class="btn btn-success">
            </div> 
            </form>  
            </div>  
            
               <!---- <div class="row justify-content-center">
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar1.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">John Smith</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar2.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Robert Downturn</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="card clean-card text-center"><img class="card-img-top w-100 d-block" src="assets/img/avatars/avatar3.jpg">
                            <div class="card-body info">
                                <h4 class="card-title">Ally Sanders</h4>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="icons"><a href="#"><i class="icon-social-facebook"></i></a><a href="#"><i class="icon-social-instagram"></i></a><a href="#"><i class="icon-social-twitter"></i></a></div>
                            </div>
                        </div>
                    </div>-->
                </div>
                </div>
                </div>
                </div>
        </section>
    </main>
   <!---- <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2018 Copyright Text</p>
        </div>
    </footer>-->
    <?php include 'footer.php'; ?>
   
</body>

</html>
<?php } ?>