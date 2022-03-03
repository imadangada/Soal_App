<?php
session_start();
include ("assets/includes/config.php");
include ("assets/includes/db_con.php");
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 3) {
    header("location:logout.php");
} else {
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>

</head>
<body>
   
     <?php include('sidebar.php') ?>
     <?php include('topbar.php') ?>

                <div class="container">
                   <h3> We are live <img src="assets/img/live.gif" width="60" height="60"></h3>
                <iframe src="https://zeno.fm/player/sooalradio" style="width:100%; height:250px"  frameborder="0" scrolling="no"></iframe>

                </div>
        
   <?php include 'footer.php'; ?>

</body>

</html>
<?php } ?>