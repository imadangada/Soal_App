<?php
session_start();
include "../assets/includes/db_con.php";
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
}elseif($_SESSION['user_type'] != 1) {
    header("location:../logout.php");
}else{
    $did=$_GET['did'];
    $delete=mysqli_query($con, "DELETE FROM users WHERE user_id=$did");

if ($con->query($delete) == TRUE) {
  echo "<script>alert('Record deleted successfully')</script>";
} else {
    echo "<script>alert('User can't delete, something wents wrong')</script>";
}
 }
  ?>


