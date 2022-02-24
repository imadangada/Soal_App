<?php
session_start();
require_once "assets/includes/config.php";
require_once "assets/includes/db_con.php";

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

<body>
   <?php include('sidebar.php') ?>
    <?php include('topbar.php') ?>
     <div class="features-container">
                </div>
    <main class="page" style="margin-top: 20px;">
        <section class="clean-block about-us">
            <div class="container">
                 <main class="main-content" >
                <div class="block-heading">
                    <div class="input-group mb-3 search-form">
                        <input type="text" class=" search-style form-control"  placeholder="Seach Questions" aria-label="Recipient's username" aria-describedby="basic-addon2" id="search" name="search" onkeyup="search()"  >
                        <div class="input-group-append ">
                          <button class="input-group-text btn-style" id="basic-addon2" name="go"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                      <div class="sarcher" id="search-result">

                      </div>

                    <h2 style="color: #074954; margin-top: 10px; position: left;" align="left">Question I Asked</h2>
                    <!--p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                    <hr>
                    <a href="#" style="color: #074954; margin-right: 45px;">Not Answer <i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a>
                     <a href="#" style="color: #074954; margin-right: 45px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a>
               <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                    <hr>
                    <a href="#" style="color: #074954; margin-right: 45px;">Answered <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                     <a href="#" style="color: #074954; margin-right: 45px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a box-shadow: inset 2px 2px 5px #babecc, inset -5px -5px 10px #fff;-->
                </div>

    <div class="row"> 
                                  

                     <?php
                     $uid=$_SESSION['user_id'];
$sql = "SELECT users.name, questions.date_ask, questions.question, questions.status, questions.q_id FROM questions INNER JOIN users ON questions.user_id = users.user_id WHERE users.user_id='$uid' ORDER BY questions.q_id DESC";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
if ($query->rowCount() > 0) {
    foreach ($results as $result) {?>
         <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
    <div class="question data-tilt">
            <div class="name">From &nbsp; <?php echo htmlentities($result->name); ?></div>
            <hr>
            
            <div class="text"><?php echo htmlentities($result->question); ?></div>
            <div class="date"><?php echo htmlentities($result->date_ask); ?></div>
            <div class="btn-likes">
                <hr>
                 <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

            <?php if ($result->status == 1) {
        ?>
                    <a href="#" style="color: #074954; float: left; overflow: auto; margin: 10px; margin-top:-10px;  padding:10px 15px; border-radius:30px;  box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.5), 10px 10px 15px rgba(70, 70, 70, 0.12); text-decoration: none;">Answered <i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                     <form action="view_answer.php" method="get">
                        <input type="hidden" name="q_id" value="<?php echo htmlentities($result->q_id); ?>">
                     <button name="q_check" style="border-style: none; color: #074954; float: right; font-size: 15px; overflow: auto; margin: 10px; margin-top:-10px; box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.5), 10px 10px 15px rgba(70, 70, 70, 0.12); padding:10px 15px; border-radius:30px; text-decoration: none; -webkit-appearance:none">View Answer <i class="fa fa-eye" aria-hidden="true"></i></button></form>
                <?php
} else {
        ?>
                <a href="#" style="color: #074954; float: left; font-size: 13px; overflow: auto; margin: 10px; margin-top:10px;  box-shadow: -10px -10px 15px rgba(255, 255, 255, 0.5), 10px 10px 15px rgba(70, 70, 70, 0.12);">Not Answer <i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
                </a>
                     <!--a href="#" style="color: #074954; float: right; font-size: 13px; overflow: auto; margin: 10px; margin-top:-10px;">View Answer <i class="fa fa-eye" aria-hidden="true"></i></a-->
           <?php }?>
        </div>
    </div>
    </div>


<?php }}?>
</div>
<!--Action button  --
</main>
<a href="#" class="float">
<i class="fa fa-bell-o my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
--Action button  -->
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
    
    <script type="text/javascript">
            var nav = document.getElementById("navigation");

  window.onscroll = function() {
    if (window.pageYOffset > 100){
      nav.style.background = "#006666";
    }else{
      nav.style.background = "transparent";
    }
  }



    VanillaTilt.init(document.querySelectorAll(".question"), {
        max: 25,
        speed: 400
    });

    //It also supports NodeList
    VanillaTilt.init(document.querySelectorAll(".question"));


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
    <?php include 'footer.php' ?>
</body>

</html>
<?php } ?>