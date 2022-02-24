<?php 
session_start();
require_once("assets/includes/config.php");
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Question - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href="assets/img/slogo.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
    height: auto;
    border: 1.0px solid #ccc;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    margin-top: 20px;
    background-color: #f2f2f2;
    box-shadow: 2px 1.5px 2px 3px #ccc;
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
    margin-top: 10px;
    margin-bottom: 10px;
    font-size: 14px;
    letter-spacing: 1px;
    word-spacing: 4px;
}
</style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#"><img src="assets/img/sooal1.png" style="width: 60%; height: 50px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"> Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="ask.php">Ask Question</a></li>
                    <li class="nav-item active" role="presentation"><a class="nav-link" href="question.php">Question</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Profile</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Notice</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <style>
                    .search-style{
                        border-color: #074954; height: 45px; border-top-left-radius: 25px; border-bottom-left-radius: 25px;
                    }
                    .btn-style{
                        background-color: #074954;
                        border-color: #074954; height: 45px; border-top-right-radius: 25px; border-bottom-right-radius: 25px;
                        color: #FFF;
                    }

                </style>
                <div class="block-heading">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control search-style"  placeholder="Seach Questions" aria-label="Recipient's username" aria-describedby="basic-addon2" id="search" name="search" onkeyup="search()">
                        <div class="input-group-append ">
                          <button class="input-group-text btn-style" id="basic-addon2" name="go">Search Question</button>
                        </div>
                      </div>
                      <div class="sarcher" id="search-result">

                      </div>
                    <h2 style="color: #074954;">Question Asked</h2>
                    <!--p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                    <hr>
                    <a href="#" style="color: #074954; margin-right: 45px;">Not Answer <i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                     <a href="#" style="color: #074954; margin-right: 45px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a>
               <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                    <hr>
                    <a href="#" style="color: #074954; margin-right: 45px;">Answered <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                     <a href="#" style="color: #074954; margin-right: 45px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a-->
                </div>
    <div class="row">                                <?php
$sql = "SELECT users.name, questions.date_ask, questions.question, questions.status FROM questions INNER JOIN users ON questions.user_id = users.user_id ORDER BY questions.q_id DESC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                            
        <div class="col-md-4 col-sm-12 col-lg-4 col-xl-4">
    <div class="question">
            <div class="name"><?php echo htmlentities($result->name);?></div>
            <div class="date"><?php echo htmlentities($result->date_ask);?></div>
            <div class="text"><?php echo htmlentities($result->question);?></div>
            <?php if ($result->status == 1) {
                ?>
                    <a href="#" style="color: #074954; float: left; overflow: auto; margin: 10px; margin-top:-10px;">Answered <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                     <a href="#" style="color: #074954; float: right; overflow: auto; margin: 10px; margin-top:-10px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a> 
                <?php
            }else{
                ?>
                <a href="#" style="color: #074954; float: left; font-size: 13px; overflow: auto; margin: 10px; margin-top:-10px;">Not Answer <i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                     <a href="#" style="color: #074954; float: right; font-size: 13px; overflow: auto; margin: 10px; margin-top:-10px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a>
           <?php } ?>
        </div>
    </div>    


<?php }} ?> 
</div>
<!--Action button  -->

<a href="#" class="float">
<i class="fa fa-bell-o my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
<!--Action button  -->
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/revolution.min.js"></script>
<script src="assets/js/bxslider.js"></script>
<script src="assets/js/owl.js"></script>
<script src="assets/js/jquery.fancybox.pack.js"></script>
<script src="assets/js/jquery.fancybox-media.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/script.js"></script>
<script src="assets/js/wows.min.js"></script>
<script src="assets/js/main.js"></script>
    <script type="text/javascript">
                function search(){
          $("#loaderIcon").show();
jQuery.ajax({
url: "search.php",
data:'search='+$("#search").val(),
type: "get",
success:function(data){
$("#search-result").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
    </script>
</body>

</html>