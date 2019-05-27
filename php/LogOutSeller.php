<?php
	require_once('initialize.php');

	UNSET($_SESSION['set']);
	header("Location:home.php");
?>