 
<?php
session_start();
require_once "../assets/includes/config.php";
include "../assets/includes/db_con.php";
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
}elseif($_SESSION['user_type'] != 2) {
    header("location:../logout.php");
}else{
    if(isset($_POST['submit']))
    {
    $admid=$_SESSION['user_id'];
    $now=md5($_POST['now']);
    $newpassword=md5($_POST['newpassword']);
    $query=mysqli_query($con,"select user_id from users where user_id='$admid' and   password='$now'");
    $row=mysqli_fetch_array($query);
    if($row>0){
    $ret=mysqli_query($con,"update users set password='$newpassword' where user_id='$admid'");
    echo "<script>alert('Your password successully changed')</script>"; 
    } else {
    
        echo "<script>alert('Current password you entered is wrong')</script>";
    }
    
    
    
    }
    ?>
<?php include 'sidebar.php';?>

<?php include 'topbar.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Profile</h1>
                       
                    </div>

                    <!-- Content Row -->
                   

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                       
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword();
return false;
}
return true;
} 

</script>
                        <form name="chngpwd" method="post" onSubmit="return valid();">        
       
                     <div class="heading-elements">
                    <ul class="list-inline mb-0">
                  
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Current Password
                          
                          </h5>
                          <div class="form-group">

   <input class="form-control white_bg" id="now" name="now"  type="password" required>
                          </div>
                        </fieldset>
                   
                      </div>
                    </div>

  <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>New Password
                         
                          </h5>
                          <div class="form-group">

  <input class="form-control white_bg" id="newpassword" type="password" name="newpassword" required>
                          </div>
                        </fieldset>
                      </div>
                    </div>

  <div class="row">
                      <div class="col-xl-6 col-lg-12">
                        <fieldset>
                          <h5>Confirm Password
                         
                          </h5>
                          <div class="form-group">
 <input class="form-control white_bg" id="confirm_password" type="password" name="confirm_password"  required>
 <script>
var password = document.getElementById("newpassword")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Does not Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</div>
                        </fieldset>
                      </div>
                    </div>


<div class="row">
<div class="col-xl-6 col-lg-12">
<button type="submit" name="submit" class="btn btn-success btn-min-width mr-1 mb-1">Change Password</button>
</div>
</div>
                                </div>
                            </div>
                        

                       

</div>

                            <!-- Color System -->
</div>
</div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
<?php include 'footer.php'; ?>

</body>

</html>
<?php } ?>