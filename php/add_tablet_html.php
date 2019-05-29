<?php require_once('initialize.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/common.css">
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="main">
				<form action="manager.php" method="post">
					<div class="box" style="float: left; left: 17.5%; top: 10%; padding-top: 5px;">
						<h1>Add New Tablet</h1>
						<!--<h5 style="float: left; margin-left: 10%; color: white; font-style: 'Times New Roman'; font-weight: normal;">Insert the Image here...</h5>
						<input type='file' name='image' required=''>	-->
						<input type='text' name='brand' placeholder="Brand">
						<input type='text' name='model' placeholder='Model' required=''>
						<input type='text' name='storage' placeholder='Storage' required=''>						
						<input type='text' name='ram' placeholder='RAM Size' required=''>
						<input type='text' name='version' placeholder='Version' required=''>
					</div>
					<div class="box" style="float: right; left: 55%; top: 10%;">
						<input type='text' name='batteryCapacity' placeholder='Battery Capacity' required=''>
						<input type='text' name='display' placeholder='Display' required=''>
						<input type='text' name='camera' placeholder='Camera' required=''>
						<input type='text' name='processor' placeholder='Processer' required=''>
						<input type='text' name='colours' placeholder='Colours' required=''>
						<input type="submit" name="Enter_tablet_data" value="Enter" style="margin-bottom: 0;">
					</div>
				</form>
			</div>
		</header>
	</div>
</body>
</html>