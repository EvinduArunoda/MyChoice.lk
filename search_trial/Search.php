<?php

	$conn = mysqli_connect("localhost","root","","trial2");

	if(mysqli_connect_error()){
		echo "Failed to Connect: ".mysqli_connect_error();
	}
	

?>

<?php

	$output = '';
	if(isset($_GET['q']) && !empty($_GET['q'])){
		$searchq = $_GET['q'];

		$q = mysqli_query($conn, "SELECT * FROM item WHERE Item_Name LIKE '%$searchq%'") or die(mysqli_error());
		$c = mysqli_num_rows($q);
		if($c == 0){
			$output = 'No search results for <b>"' . $searchq . '"</b>';
		} else {
			while($row = mysqli_fetch_array($q)){
				$Item_Id = $row['Item_Id'];
			}
			$q1 = mysqli_query($conn, "SELECT * FROM availabilitycheck WHERE Item_ID LIKE '%$Item_Id%'") or die(mysqli_error());
			while($row = mysqli_fetch_array($q1)){
				$availability = $row['Availability'];
				$Store_ID = $row['Store_ID'];
				$Price = $row['Price'];
				if($availability == 1){
				$q2 = mysqli_query($conn, "SELECT * FROM store WHERE Store_Id LIKE '%$Store_ID%'") or die(mysqli_error());	
				while($row = mysqli_fetch_array($q2)){
					$Store_Name = $row['Store_name'];
					$Contact_No = $row['Telephone'];
				}

				
				$output .= '<h>'.$Store_Name ." : ". $Price ." : ". $Contact_No . '</h>
							<br>
							</a>';
				
	
				}
			}
			if($output == ''){
				$output = 'No stocks are available for <b>"' . $searchq  . '"</b>';}
		}

	}else {
		header("loaction: ./");
	}
	
	mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="result.css">
	<title>Result</title>

</head>
<body>

	<div class="result">
	<h1>Results</h1>
	<h2><?php echo $output  ?></h2>
	</div>

	<div class="search">
			<form action="./index.php" method="get">
				<input type="submit" value="Back">
			</form>
	</div>
	
</body>
</html>