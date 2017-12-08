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

		//verificar login
		public function verificaLogin($login,$senha)
		{
			try{
				//chamando classe SQL
				$sql =  new Sql();

				//criptografar senha
				$cripSenha = md5($senha);

				//fazendo consulta no banco para verificar se os campos sao compativeis
				$query = $sql->select("SELECT * FROM login where nomelogin = :log AND senha = :sen",[
					":log"=>$login,
					":sen"=>$cripSenha
					]);
			}catch(PDOException $e){
				echo $e->getMessage();
			}

			//instanciando classe para chamar o metodo setData que é herdado da classe Model
			$user = new User();

			//setando os dados para a variavel
			$user->setData($query);

			//criando sessao com os dados do usuarios
			$_SESSION['usuario'] = $user->getValues();

			return $user; //retornando o array com os dados -> isso caso o dev queira manipular
		}
	}
?>