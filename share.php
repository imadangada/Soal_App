<?php
session_start();
require_once "assets/includes/config.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - soo'al</title>
    <meta name="description" content="A platform that people can ask islamic question and get its answer from assigned ulamaa.">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href=" assets/img/logo.jpg">
    <link rel="icon" type="image/jpeg" sizes="undefinedxundefined" href=" assets/img/slogo.jpg">
    <link rel="stylesheet" href=" assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href=" manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href=" assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href=" assets/css/smoothproducts.css">
    <link href=" assets/css/font-awesome.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/5c83a5112a.js"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
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
	border-radius:10px;
    border-style: hidden;
}

.label-arrow{
	display:table-cell;
	vertical-align:middle;
	color:#333;
	opacity:0.5;
    border-style: hidden;
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

.float2{
    width:40px;
    height:40px;
    bottom:496px;
    right:140px;
    padding: 10px;
    background-color: #074954;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    box-shadow: 2px 2px 3px #999;
    z-index: 1000;
    float: right;
    display: inline-block;
    margin-top: 0px;
}

.my-float2{
    font-size:20px;
    margin-top:0px;
    text-align: center;
}
a.float2 + div.label-container2 {
  visibility: hidden;
  opacity: 0;
  transition: visibility 0s, opacity 0.5s ease;
}

a.float2:hover + div.label-container2{
  visibility: visible;
  opacity: 1;
}
.label-container2{
    position:fixed;
    bottom:500px;
    right:185px;
    display:table;
    border-radius: 50px;
    visibility: hidden;
}

.label-arrow2{
    display:table-cell;
    vertical-align:middle;
    color:#333;
    opacity:0.5;
}
.label-text2{
    color:#FFF;
    background:rgba(51,51,51,0.5);
    display:table-cell;
    vertical-align:middle;
    padding:5px;
    border-radius:10px;
    border-style: hidden;
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
.preach{
    padding: 20px;
    width: 100%;

}
.p_title{
    width: 100%;
    border: 1.0px solid #b3b3b3;
    padding: 10px;
    border-radius: 4px;
    outline: none;
}
.ans-input{
    width: 100%;
    border: 1.0px solid #b3b3b3;
    padding: 20px;
    min-height: 200px;
    border-radius: 4px;
    margin-top: 0px;
    outline: none;
}

.ans-input2{
    width: 100%;
    border: 1.0px solid #b3b3b3;
    padding: 20px;
    min-height: 100px;
    border-radius: 4px;
    margin-top: 0px;
    outline: none;
}
.pic-side{
    min-height: 350px;
    background-size: cover;
    background-attachment: left;
    background-position: center;
    background-repeat: no-repeat;
    border-radius: 30px 0px 0px 30px;
    padding: 20px;
    padding-top: 65px;
}
.row{
    border:1.0px solid #ccc;
    min-height: 250px;
    max-width: 80%;
    margin-left: 10%;
    margin-top: -150px;
    border-radius: 30px;
    overflow: auto;
    padding: 20px;
    padding-top: 50px;
    box-shadow: 2px 1.5px 2px 3px #ccc;
}
.file{
    margin-top: 10px;
    display: none;
}
.btn-sooal{
    background-color: #074954;
    color: #fff;
    margin-top: 10px;
}
.popup{
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select: none;
}
.popup .popuptext{
    visibility: hidden;
    width: 160px;
    background-color:#074954;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 40%;
    margin-left: 10px;
    margin-bottom: -30px;
}
.popup .popuptext::after{
    content: "";
    position: absolute;
    top: 0%;
    left: 0%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #074954 transparent transparent transparent;
}
.popup .show{
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
}
@-webkit-keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}
@keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#"><img src=" assets/img/sooal1.png" style="width: 60%; height: 50px;"></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active" role="presentation"><a class="nav-link" href="dashboard.php"> Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="preach.php">Preach</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Profile</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="clean-block about-us">
            <div class="container">
                <div class="block-heading">
                    <hr>
                </div>


<!--Action button  -->

<a href="#" class="float">
<i class="fa fa-plus my-float"></i>
</a>
<div class="label-container">
<div class="label-text">Notification</div>
<i class="fa fa-play label-arrow"></i>
<!--Action button  -->
</div>
           <div class="container" style="margin-top: 150px;">
            <div class="row">
                <?php
if (isset($_GET["share"])) {
    $p_id = $_GET["share_id"];
    $sql = "SELECT *  FROM preachs WHERE p_id = '$p_id'";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {?>

            <div class="colmd-5 col-sm-12 col-lg-5 col-xl-5 pic-side">
             <form action="" method="" role="form" >
            <div class="answer">
            <div class="form-group">
            <textarea name="preach" class="ans-input2" value="Type your preach here...." readonly=""><?php echo htmlentities($result->p_title); ?></textarea>
            </div>
             <audio controls>
  <source src="assets/upload/<?php echo htmlentities($result->audio); ?>" type="audio/ogg">
</audio>
            </div>
              <div class="form-group">
            <input type="url" name="link" id="url" class="form-control" value="http://localhost/sooal/visit.php?p_id=<?php echo $p_id ?>" readonly="">
            <span class="btn btn-sooal" onclick="copy()">Copy url</span> <div class="popup">
                    <span class="popuptext" id="mypopup">Copied!</span>
                </div>
        </div>
            </form>
</div>
<div class="colmd-7 col-sm-12 col-lg-7 col-xl-7 preach">

                    <h2 style="color: #074954; float: left;">preach</h2>
<button class="label-container2">
<!--div class="label-text2">Add Audio</div>
<i class="fa fa-play label-arrow"></i-->
    <!--  http://localhost/sooal/assets/upload/AUD-20200203-WA0262.mp3 -->
<!--Action button  -->
</button>
                    <form action="" method="" role="form" >
            <div class="answer">
            <div class="form-group">
            <textarea name="preach" class="ans-input" value="Type your preach here...." readonly=""><?php echo htmlentities($result->preach); ?></textarea>
            </div>

        </div>
<?php }}}?>
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
    <script src=" assets/js/jquery.min.js"></script>
    <script src=" assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src=" assets/js/smoothproducts.min.js"></script>
    <script src=" assets/js/theme.js"></script>
    <script type="text/javascript">
        function show_input(){
           var a = document.getElementById("audio");
            a.style.display= "block";
        }
        function copy() {
            //GET THE URL FIELD
            var copyText = document.getElementById("url");
            //SELECT THE URL FIELD
            copyText.select();
            copyText.setSelectionRange(0,99999);

            //COPY THE FIELD INSIDE THE URL FIELD
            document.execCommand("copy");

            //ALERT WHEN SUCCEED
            popup();
        }
        function popup() {
            var popup = document.getElementById("mypopup");
            popup.classList.toggle("show");
        }
    </script>
</body>

</html>