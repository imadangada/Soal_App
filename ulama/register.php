<?php 
require_once("assets/includes/config.php");
if (isset($_POST['submit'])){
  $name=$_POST['name'];
  $password=md5($_POST['password']);
  $login_id=$_POST['login_id'];
   $sql ="INSERT INTO users (name,password,login_id,status) VALUES ('$name','$password','$login_id','1')";
$query= $dbh -> prepare($sql);
$query-> bindParam(':name', $name, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> bindParam(':login_id', $login_id, PDO::PARAM_STR);
$query-> execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    session_start();
    $_SESSION['user_id']="$lastInsertId";
  header("location:dashboard.php");
}
else{
  echo "error found";
}
}
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
</head>

<body>
    
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 style="color: #074954;">Registration</h2>
                    <p>Register with soo'al to get access to ask islamic question and get the answer from one of the ulama'a</p>
                </div>
                <form action="register.php" method="post">
                    <div class="form-group"><label for="name">Name</label><input class="form-control item" type="text" id="name" name="name" style="border-color: #074954; height: 45px; border-radius:25px;"></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" id="password" name="password" style="border-color: #074954; height: 45px; border-radius:25px;"></div>
                    <div class="form-group"><label for="email">Email or Phone Number</label><input class="form-control item" type="email" id="email" name="login_id" style="border-color: #074954; height: 45px; border-radius:25px;"></div>
                    <button class="btn btn-primary btn-block" style="background-color:#074954; border-color: aliceblue;" type="submit" name="submit">Sign Up</button>
                    <p></p> If you have account <a href="login.php" style="color:#074954; margin-top: 10px;">login now</a>
                </form>
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
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>