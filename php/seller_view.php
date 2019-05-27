<?php require_once('initialize.php') ;
$db = Database::getInstance();
$connection = $db->getConnection(); ?>

<?php 

 	$folder = "";

	function display($row,$price,$folder){
		echo "<div class='item-column'>";
			echo "<div class='pict' id='img_dir'>";
				echo "<img src='../images/$folder/".$row['Logo']."'>";
			echo "</div>";
			echo "<h4>" . $row['model'] . "</h4>";
			echo "<h5>Price : ".$price."</h5>";
		echo "</div>";
	}

	function find($connection,$Store_id,$folder,$id){
		$query1="SELECT * FROM itemavailability WHERE store_id='$Store_id' AND category_id=$id";
		$result1=mysqli_query($connection,$query1);
		$count = mysqli_num_rows($result1);
		if($count>0){
			echo "<h2>".$folder."</h2>";
			while($row1=mysqli_fetch_assoc($result1)){
				if($row1['isDeleted']==0){
					$item_id = $row1['item_id'];
					$query2="SELECT * FROM item WHERE item_id='$item_id' ";
					$result2=mysqli_query($connection,$query2);
					if ($result2){
						$numOfRows=mysqli_num_rows($result2);
						if($numOfRows>0) {
			      			$row2= mysqli_fetch_assoc($result2);
			      			display($row2,$row1['price'],$folder);
					    }
					}
				}
			}
		}
	}
  ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>NOVUS CREATIONS</title>
	<link rel="stylesheet" type="text/css" href="../css/seller_view.css">
	<script>
		$(document).ready(function(){
			load_business_data();
			function load_business_data()
			{
				$.ajax({
					url:'seller_view.php',
					method:"POST",
					success:function(data)
					{
						$('#business_list').html(data);
					}
				})
			}
			$(document).on('mouseenter','.rating',function(){
				var index = $(this).data('index');
				var business_id = $(this).data('business_id');
				remove_background(business_id);
				for (var count = 1;count<=index; count++)
				{
					$('#'+business_id+'-'+count).css('color','#ffcc00');
				}

			});
		 	function remove_background(business_id)
		 	{
		 		for(var count = 1; $count <= 5; count++)
		 		{
		 			$('#'+business_id+'-'+count).css('color','#ccc');
		 		}
		 	}

		 	$(document).on('click','.rating',function(){
		 		var index = $(this).data('index');
		 		var business_id = $(this).data('business_id');
		 		$.ajax({
		 			url:"insert_rating.php",
		 			method:"POST",
		 			data:{index:index,business_id:business_id},
		 			success:function(data)
		 			{
		 				if(data== 'done')
		 				{
		 					load_business_data();
		 					alert("You have rate "+index+" out of 5");
		 				}
		 				else
		 				{
		 					 alert("There is some problem in system");
		 				}
		 			}
		 		})
		 	});
		 	$(document).on('mouseleave','.rating',function(){
		 		var index = $(this).data('index');
		 		var business_id = $(this).data('business_id');
		 		var rating = $(this).data('rating');
		 		remove_background(business_id);
		 		for(var count = 1; count<=rating; count++)
		 		{
		 			$('#'+business_id+'-'+count).css('color', '#ffcc00');
		 		}
		 	})
		 });
	</script>   
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="main"> 
				<ul>
					<li class="active"><a href="#">Home</a></li>
					<li><a href="services.php">Services</a></li>
					<li><a href="clients.php">Our Clients</a></li>
					<li><a href="contact_us.php">Contact us</a></li>
					<li><a href="about_us.php">About us</a></li>		
				</ul>
			</div>
			<div class="title">
				<h1>MyChoice.lk</h1>
			</div>
		</header>
		<div class="rest">
			<div class="data">
				<div class="profile-data">					
					<?php 
					$color = '';
					$Store_id = $_GET['var'];
					$query="SELECT * FROM seller WHERE store_id='$Store_id' ";
					$result=mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($result)){
					$rating = $row['rating'];
					$output = '<ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">'; 
					for($count=1; $count<=5; $count++){
						if($count <= $rating) { $color = 'color:#ffcc00;'; } else{ $color = 'color:#ccc;'; }
						$output.='<li class="rating" style="display:inline-block; cursor:pointer; '.$color.'font-size:16px;">&#9733;</li>';
					}
					$output.='</ul>';
						echo "<div class='pic' id='img_dir'>";
							echo "<img src='../images/Sellers/".$row['logo']."'>";
						echo "</div>";
						echo "<div class='profile' style='text-align: left; padding-left: 20px; text-decoration: none;'>";
							echo "<h3>Store Name : " . $row['store_name'] . "<br>Company Name : " . $row['companyName'] ."<br>Address : " . $row['store_address'] . "<br>Telephone : " . $row['telephone'] . "<br>Mobile : " . $row['mobile'] . "<br>Website : " . $row['website'] . "<br>Email : " . $row['store_email'] . "<br>Rating : " . $output . "</h3>";
						echo "</div>";
					} ?>
				</div>
				<div class="display-items">
					<div class="items">
						<?php find($connection,$Store_id,"Mobile Phones",1); ?>
					</div>
					<div class="items clearfix">
						<?php find($connection,$Store_id,"Laptops",3); ?>
					</div>
					<div class="items clearfix">
						<?php find($connection,$Store_id,"Tablets",2); ?>
					</div>
					<div class="items clearfix">
						<?php find($connection,$Store_id,"Televisions",4); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>