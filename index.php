<?php

	include('User.php');
	include('Produto.php');

	$teste = new User();

	$teste->login('admin');

	var_dump($_SESSION['user']);

	$produtos = new Produto();

	$data = $produtos->listAll();

	var_dump($data);
?>