<?php

$dbhost = 'localhost';
$dbUsername = "root";
$dbPassword = "";
$dbName = "mychoice";

$db = new mysqli($dbhost, $dbUsername, $dbPassword, $dbName);

$searchItem = $_GET['term'];

$query = $db->query("SELECT * FROM item WHERE model LIKE '%$searchItem%' AND item_isActive = '0' ORDER BY model ASC");

$dataArray = array();
if($query->num_rows > 0){
	while($row = $query -> fetch_assoc()){
		$data['id'] = $row['item_id'];
		$data['value']= $row['model'];

		array_push($dataArray,$data);
	}
}

echo json_encode($dataArray);

?>