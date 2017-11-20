<?php

	include('User.php');	

	$teste = new User();

	$teste->login('admin');

	var_dump($_SESSION['user']);
?>