<?php include ("assets/includes/db_con.php"); ?>
<?php
session_start();
$msg="";
$login_id="";
if (isset($_POST['submit'])){
  $login_id=$_POST['login_id'];
  $password=md5($_POST['password']);
  $query="SELECT * FROM users WHERE login_id='$login_id' AND password='$password'";
  $result=mysqli_query($con,$query) or die(mysqli_error($con));
  $count=mysqli_num_rows($result);
  if($count == 1){
    while ($row=mysqli_fetch_assoc($result)){
      $user_id=$row['user_id'];
      $user_type=$row['user_status'];
      $_SESSION['user_id']="$user_id";
      $_SESSION['user_type']="$user_type";
   if ($user_type == 1) {
    header("location:admin/dashboard.php");
    }elseif($user_type == 2) {
    header("location:ulama/dashboard.php");
    }elseif($user_type == 3){
        header("location:dashboard.php");
    }else{
        $msg="Access Denied!";
    }
}
}else{
    $msg="Invalid! please input valid username/password!";
}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
  <style>
    body{
        padding: 1%;
    }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row" style="margin-top: 80px;">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
    <main class="page login-page">
        <section class="clean-block clean-form">
            
                <form action="login.php" method="post">
                    <h2 style="color: #074954;" align="center">Users Login</h2>
                    <br />
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?>
                    <div class="form-group"><label for="email">Email or Phone Number</label><input class="form-control item" type="text" name="login_id" id="email" value="<?php echo $login_id ?>"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control" type="password" id="password" name="password"></div>
                    <div class="form-group">
                        <div class="form-check"><input class="form-check-input" type="checkbox" id="checkbox"><label class="form-check-label" for="checkbox">Remember me</label></div>
                        
                    </div><button class="btn btn-primary btn-block" style="background-color:#074954; border-color: aliceblue;" type="submit" name="submit">Log In</button>
                   <p></p> You don't have account? <a href="register.php" style="color:#074954; margin-top: 50px;">Register now</a><br>
                   
                </form>
            
                </div>
          </section>
          <div class="col-sm-3">
            </div>
      
  </div>
    <!--<footer class="page-footer dark">
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

    <script type="text/javascript" src="assets/js/sweetalert.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>