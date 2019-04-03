<?php require_once('../inc/Connection.php');
	$db = Database::getInstance();
    $connection = $db->getConnection();  ?>
<?php 
	$msg="";
	if (isset($_POST['submit'])){
		$email=$_POST['emailAddress'];
		$username=$_POST['username'];
		$psw=$_POST['password'];
		$reconfirmed_psw=$_POST['reconfirmedPassword'];
		$is_deleted=0;
		if ($psw==$reconfirmed_psw){
			if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#", $psw)){
			    $msg= "Your password is strong.";
				$psw=sha1($psw);
				$last_id=$_SESSION['Store_id'];
				$query="UPDATE store SET Username='$username', Password='$psw' WHERE Store_id='$last_id'";	
				$result=mysqli_query($connection,$query);
				if($result){
					$msg= "Sign up Successful";
					header("Location:http://localhost/myPhp/project/ums/php/login.php");
				}
			} else {
			    $msg= "Your password is not safe.";
			}
		}else{
			$msg="Please, Re-Check your password";
		}
		
	}
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>signup</title>
	<link rel="stylesheet" href="../css/style_signup.css">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<div class="main">
			<form class="box" action="signup.php" method="post">
				<h3 style="color:red;><?php echo($msg) ?></h3>
				<h1>SIGN UP</h1>
				<br><input type="email" name="emailAddress" placeholder="Email Address">
				<input type="text" name="username" placeholder="Username" id="">
				<h6 class="pwd-rules">"Your password must contain at least 8 alphabetical[both (a-z)&(A-Z)] and numerical characters "</h6>
				<input type="password" name="password" placeholder="Password" id="">
				<input type="password" name="reconfirmedPassword" placeholder="Re-Confirm Password">
				<input type="submit" name="submit"value="Sign up" >
				<P>Already have an account ? <a href="login.php"> Log In Here</a></P>
			</form>
		</div>
	</header>
</body>
</html>