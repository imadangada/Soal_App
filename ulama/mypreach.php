<?php
session_start();
require_once "../assets/includes/config.php";
require_once "../assets/includes/db_con.php";

if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
} elseif ($_SESSION['user_type'] != 2) {
    header("location:../logout.php");
} else {
    ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>My Preach - soo'al</title>
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
   <?php include 'sidebar.php'; ?>
   <?php include 'topbar.php'; ?>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <h2 style="color: #074954;">All Preach I Posted</h2>
                    <hr>
                </div>
                        <div class="row"> 
                    
                               <?php
                               $uid=$_SESSION['user_id'];
$sql = "SELECT * from preachs WHERE ulama_id='$uid'  ORDER BY p_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                <form action="answer.php" method="get">
            <div class="name"><?php echo htmlentities($result->p_title);?></div>
            <hr>
            
            <div class="text">QuestioN: <?php echo htmlentities($result->preach);?></div>
            <div class="date"><?php echo htmlentities($result->date);?></div>
            <hr>
           <div class="bg-success text-white text-center">
            <span class="fa fa-thumbs-up"></span> <?php echo htmlentities($result->likes);?>
        </div>
            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               


<?php }} ?> 
    


              
                </div>
            </div>
        </section>
    </main>
  
   <?php include 'footer.php'; ?>
</body>

</html>
<?php } ?>