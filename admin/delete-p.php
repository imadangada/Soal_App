<?php
session_start();
include "../assets/includes/db_con.php";
if (strlen($_SESSION['user_id'] == 0)) {
    header("location:../logout.php");
}elseif($_SESSION['user_type'] != 1) {
    header("location:../logout.php");
}else{
    $pid=$_GET['pid'];
    $delete=mysqli_query($con, "DELETE FROM preachs WHERE p_id=$pid");

if ($con->query($delete) == TRUE) {
  echo "<script>alert('Record deleted successfully')</script>";
} else {
    echo "<script>alert('User can't delete, something wents wrong')</script>";
}
 }
  ?>


