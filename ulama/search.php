<?php 
require_once("assets/includes/config.php")
session_start();
if(!empty($_POST["search"])) {
  $search= strtoupper($_POST["search"])
    $sql ="SELECT * FROM questions WHERE question like %$search OR question LIKE $search% OR question LIKE %$search%";
$query= $dbh -> prepare($sql);
$query-> bindParam(':search', $search, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
	?>
<div style="font-size: 13pt;"><?php echo htmlentities($result->question);?></div>
<?php 
}
}
}

?>
