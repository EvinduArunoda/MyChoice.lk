<?php require_once('Connection.php'); 
	require_once('Utility.php');
?>
<?php 
	 $db = Database::getInstance();
   	 $conn = $db->getConnection();
   	 $brand=$_POST['bid'];
	$utility=new Utility();
	$items=$utility->loaditems($brand);
	echo json_encode($items);


 ?>