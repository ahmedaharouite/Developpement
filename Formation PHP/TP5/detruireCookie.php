<?php

	$value = $_COOKIE['login'];
	setcookie("login", $value, time()-3600);

	header("location:index.php");
	exit();

?>

