<?php
session_start();
include ("../assets/includes/config.php");
include ("../assets/includes/db_con.php");

if (strlen($_SESSION['user_id'] == 0)) {
    header("location:logout.php");
} elseif ($_SESSION['user_type'] != 2) {
    header("location:logout.php");
} else {


if (isset($_GET['q_id'])) {
                $q_id=$_GET['q_id'];
                $_SESSION['q_id']="$q_id";
            }


if (isset($_POST['send'])) {
    $answer=$_POST['answer'];
    /*
    $sql="UPDATE questions SET status='1', answer='$answer', ulama_id='$user_id' WHERE q_id = '$q_id'";
    
    if($con -> query($sql)===true){
        echo "hello";
           }else{
      echo"error".$sql.$con -> error;
    }
    */
    try {
    $user_id=$_SESSION['user_id'];
    $q_id=$_SESSION['q_id'];
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql="UPDATE questions SET status='1', answer='$answer', ulama_id='$user_id' WHERE q_id = '$q_id'";

    // Prepare statement
    $stmt = $dbh->prepare($sql);

    // execute the query
    $stmt->execute();

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    header("location:dashboard.php");
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
    }

 ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="../image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="../image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
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
	background-color: #074954;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
    z-index: 1000;
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
.question{
    width: 100%;
    min-height: 210px;
    border: 1.0px solid #ccc;
    padding: 35px;
    border-radius: 10px;
    margin-bottom: 20px;
    margin-top: 20px;
    background-color: #f2f2f2;
    box-shadow: -2px 1.5px 2px 3px #ccc;
}
.name{
    text-transform: capitalize;
    font-weight: 600;
    word-spacing: 10px;
    float: left;
    display: block;
    position: relative;
    width: 100%;
}
.date{
    margin-top: 5px;
    display: block;
    position: relative;
    font-size: 12px;
    word-spacing: 40px;
}
.text{
    margin-top: 20px;
    margin-bottom: 10px;
    font-size: 14px;
    letter-spacing: 1px;
    word-spacing: 4px;
}
.ans-btn{
    width: 100%;
    background-color: #074954;
    border:1px solid #074954;
    color: #fff;
    padding: 7px;
    border-radius: 4px;
    margin-top: 15px;
}
.ans-btn:hover{
    border-right-color: #0a6676;
}
.answer{
    padding: 20px;
    border: 1.0px solid #ccc;
    border-radius: 10px;
    width: 100%;
    min-height: auto;
    margin-top: 20px;
    box-shadow: 2px 1.5px 2px 3px #ccc;

}
.ans-input{
    width: 100%;
    border: 1.0px solid #b3b3b3;
    padding: 20px;
    min-height: 100px;
    border-radius: 4px;
}
</style>
</head>

<body>
   <?php include 'sidebar.php'; ?>
   <?php include 'topbar.php'; ?>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    Answer The Question
                    <hr>
                </div>
                

<!--Action button  --

<a href="#" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
<!--Action button  -->

           <div class="row">   
            <div class="colmd-6 col-sm-12 col-lg-6 col-xl-6">                             
                    <h2 style="color: #074954;">Question</h2>
                <?php
               $q_id=$_SESSION['q_id'];
$sql = "SELECT users.name, questions.date_ask, questions.question, questions.status, questions.q_id FROM questions INNER JOIN users ON questions.user_id = users.user_id WHERE questions.q_id='$q_id'  ORDER BY questions.q_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                            
    <div class="question">
            <div class="name"><?php echo htmlentities($result->name);?></div>
            <div class="date"><?php echo htmlentities($result->date_ask);?></div>
            <div class="text"><?php echo htmlentities($result->question);?></div>
            <div>
            </div>
    </div>    


<?php }} ?> 
</div>  
<div class="colmd-6 col-sm-12 col-lg-6 col-xl-6">   
                    <h2 style="color: #074954;">Answer</h2>
                    <form action="answer.php" method="post">
            <div class="answer">
            <textarea name="answer" class="ans-input" placeholder="Type your answer here...."></textarea>       
            <input type="submit" name="send" value="Send" class="ans-btn">
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