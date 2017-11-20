<?php
	session_start();
	include('Model.php');

	class User extends Model{
		
		public function login($login)
		{
			$conn = mysqli_connect("localhost","root","","dbbijus");

			$query = mysqli_query($conn, "SELECT * FROM login where NomeLogin LIKE '%$login%'");

			$queryT = mysqli_fetch_assoc($query);
			
			$data = $queryT;

			$user = new User();

			//setando os dados - fica armazenado na variavel values do model
			$user->setData($data);

			//pegando os dados da variavel values do model
			$_SESSION['user'] = $user->getValues();

			return $user;
		}
	}
?>