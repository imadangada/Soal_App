<?php
session_start();
include ("assets/includes/config.php");
include ("assets/includes/db_con.php");

if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 3) {
    header("location:logout.php");
} else {

$q_sent = "";
$user_id = $_SESSION['user_id'];
if (isset($_POST['submit'])) {
    $question = $_POST['question'];
    $sql = "INSERT INTO questions (question,user_id,status) VALUES ('$question','$user_id','0')";
    $query = $dbh->prepare($sql);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $q_sent = "true";
    } else {
        $q_sent = "false";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Zamantakewa - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>

    <style>
        *{padding:0;margin:0;}
.label-container{
    position:fixed;
    bottom:48px;
    right:105px;
    display:table;
    visibility: hidden;
}

.label-text{
    color:#FFF;
    background:rgba(51,51,51,0.5);
    display:table-cell;
    vertical-align:middle;
    padding:10px;
    border-radius:3px;
}

.label-arrow{
    display:table-cell;
    vertical-align:middle;
    color:#333;
    opacity:0.5;
}

.float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color: #074954;;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    box-shadow: 2px 2px 3px #999;
}

.my-float{
    font-size:24px;
    margin-top:18px;
}

a.float + div.label-container {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease;
}

a.float:hover + div.label-container{
  visibility: visible;
  opacity: 1;
}
.my-alert{
    padding: 30px;
    padding-bottom: 0;
    width: 100%;
}
</style>
</head>

<body>
    <?php include('sidebar.php') ?>
<?php include('topbar.php') ?>
 <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Post Your Question</h1>
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Post Your Question</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                        
                    <p>Notice : Try searching the question you have in your mind before you ask, may be someone ask the same question
                        you wanted to ask, to search <a href="search.php" style="color: #074954;">Click here</a>. Thank you!
                    </p>
                
                        
                    </div>
                </div>
            </div>
<div class="col-sm-6">
    <main class="page login-page">
        <section class="clean-block clean-form dark">
             <div align="center" class="my-alert">
                        <?php if ($q_sent == "true") {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities("Question sent successfully"); ?>
</div>
</div>
<?php } elseif ($q_sent == "false") {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong>
 <?php echo htmlentities("Fail to connect to the server, please check your internet connection"); ?>
</div>
</div>
<?php }?>
                    </div>
                <form action="ask.php" method="post">
                    <div class="form-group">
                        <label for="email">What is your question?</label><textarea style="width: 100%; height: 150px;" placeholder="Write your question here. 3 language are supported English Hausa and Arabic" class="form-control item" type="text" id="ask" name="question"></textarea></div>

                    <button class="btn btn-primary btn-block" style="background-color:#074954; border-color: aliceblue;" type="submit" name="submit">Post Question</button>
                  </form>

                </div>

        </section>
    </main>

  <?php include 'footer.php'; ?>
</body>

</html>
<?php } ?>