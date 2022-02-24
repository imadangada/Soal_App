<?php 
include("assets/includes/db_con.php");
require_once("assets/includes/config.php");
session_start();
if(isset($_GET["like"])) {
  $p_id= $_GET["p_id"];
  $user_id = $_SESSION['user_id'];
 
    $sql ="SELECT * FROM likes WHERE user_id=:user_id AND p_id=:p_id";
$query= $dbh -> prepare($sql);
$query-> bindParam(':user_id', $user_id, PDO::PARAM_STR);
$query-> bindParam(':p_id', $p_id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0){
	foreach($results as $result)
{ 

	$init_like = $result->status;
	if ($init_like > 0) {
		$c_like = $init_like - 1;
	}else{
	$c_like = $init_like + 1;
	}
}
    try {
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query2="UPDATE likes SET  status='$c_like' WHERE p_id = '$p_id' AND user_id ='$user_id'";

    // Prepare statement
    $stmt = $dbh->prepare($query2);

    // execute the query
    $stmt->execute();
    header("location:dashboard.php");
    }
catch(PDOException $e)
    {
    echo $query2 . "<br>" . $e->getMessage();
    }
} else {

try {
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query2="INSERT INTO likes (user_id,p_id,status) VALUES('$user_id','$p_id','1')";

    // Prepare statement
    $stmt = $dbh->prepare($query2);

    // execute the query
    $stmt->execute();

    header("location:dashboard.php");
    }
catch(PDOException $e)
    {
    echo $query2 . "<br>" . $e->getMessage();
    }
}
}

?>