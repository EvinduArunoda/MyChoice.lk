 <?php

$connect = new PDO('mysql:host=localhost;dbname=mychoicelk_db','root','');
if(isset($_POST["index"], $_POST["business_id"]))
{
	// return values from db
	$query = "SELECT rating, rating_count FROM seller WHERE store_id=".$_POST["business_id"];
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetch();
	$rating_count = $result['rating_count'] + 1;
	$rating = ($result['rating']*$result['rating_count'] + $_POST["index"])/$rating_count;
	$query = "UPDATE seller SET rating = ".$rating.", rating_count = ".$rating_count." WHERE store_id = ".$_POST["business_id"];
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	echo 'done';
}
?>