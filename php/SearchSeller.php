<?php

	$conn = mysqli_connect("localhost","root","","mychoice");

	if(mysqli_connect_error()){
		echo "Failed to Connect: ".mysqli_connect_error();
	}
	
?>

<?php

	$output = '';
	if(isset($_GET['q']) && !empty($_GET['q'])){
		$searchq = $_GET['q'];
		if($searchq == ''){
			header("loaction: ./SearchBySellerInterface.php");
		}
		
		$q = mysqli_query($conn, "SELECT * FROM seller WHERE store_name LIKE '%$searchq%'") or die(mysqli_error());
		$c = mysqli_num_rows($q);
		if($c == 0){
			$output = 'No search results for <b>"' . $searchq . '"</b>';
		} else {
			while($row = mysqli_fetch_array($q)){
				$store_id = $row['store_id'];
			}
		}
	
	if($output == ''){
			header ("Location: ./seller_view.php?var=".$store_id."");
		}
	else{
		echo $output;
	}

	}else {
		header("loaction: ./");
	}
	
	mysqli_close($conn);
?>
