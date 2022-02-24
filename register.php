<?php include('assets/includes/db_con.php'); ?>
<?php
$msg = "";
$name = "";
$login_id = "";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $login_id = $_POST['login_id'];
    $query = "SELECT * FROM users WHERE login_id='$login_id'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $pass_error = '<script>swal("Invalid", "The Email address or phone number is already registered!", "error")</script>';
    } else {
        if ($password != $cpassword) {
            $pass_error = '<script>swal("Invalid", "Password and comfirm password did not match!", "error")</script>';
        } else {
            $sql = "INSERT INTO users (name,password,login_id,user_status) VALUES ('$name','$password','$login_id','3')";
            if ($con->query($sql) === true){
            $msg="<font color='green'>You have successfully registered, <a href='login.php'>click here to login</a></font>";
        }
        else
          {
            $msg="Something Went Wrong. Please try again";
          }

        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Soo'al</title>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<style>
    body{
        padding: 1%;
    }
    </style>
<body>
    <div class="container-fluid">
    <main class="page registration-page" style="margin-top: 100px;">
        <section class="clean-block clean-form">


                <form action="register.php" method="post">
                    <h2 style="color: #074954;">Register</h2>
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?>
                    <div class="form-group"><label for="name">Name</label><input class="form-control item" type="text" value="<?php echo $name ?>" id="name" name="name" ></div>
                    <div class="form-group"><label for="password">Password</label><input class="form-control item" type="password" id="password" name="password"></div>
                    <div class="form-group"><label for="Confirm Password">Confirm Password</label><input class="form-control item" type="password" id="confirm_password" name="cpassword"></div>
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
                    <div class="form-group"><label for="email">Email or Phone Number</label><input class="form-control item" type="email" value="<?php echo $login_id ?>" id="email" name="login_id"></div>
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