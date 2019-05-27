<?php

$dbhost = 'localhost';
$dbUsername = "root";
$dbPassword = "";
$dbName = "mychoice";

$db = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

$searchItem = $_GET['term'];

$query = $db->query("SELECT * FROM seller WHERE store_name LIKE '%$searchItem%' AND seller_isActive = '0' ORDER BY store_name ASC");

$dataArray = array();
if($query->num_rows > 0){
	while($row = $query -> fetch_assoc()){
		$data['id'] = $row['store_id'];
		$data['value']= $row['store_name'];

		array_push($dataArray,$data);
	}
}

echo json_encode($dataArray);

?>