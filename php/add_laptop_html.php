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
					<div class="box" style="float: left; left: 17.5%;; padding-top: 5px;">
						<h1>Add New Laptop</h1>
						<!--<h5 style="float: left; margin-left: 10%; color: white; font-style: 'Times New Roman'; font-weight: normal;">Insert the Image here...</h5>						
						<input type='file' name='image' required=''>-->			
						<input type='text' name='brand' placeholder='Brand'>
						<input type='text' name='model' placeholder='Model'>
						<input type='text' name='storage' placeholder='Storage'>
						<input type='text' name='ram' placeholder='RAM Size'>
						<input type='text' name='os' placeholder='Operating System'>
					</div>
					<div class="box" style="float: right; left: 55%;">
						<input type='text' name='batterycapacity' placeholder='Battery Capacity'>
						<input type='text' name='display' placeholder='Display'>
						<input type='text' name='processor' placeholder='Processer'>
						<input type='text' name='colours' placeholder='Colours'>
						<input type="submit" name="Enter_laptop_data" value="Enter" style="margin-bottom: 0;">						
					</div>
				</form>
			</div>
		</header>
	</div>
</body>
</html>