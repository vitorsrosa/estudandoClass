<?php
	session_start();
	include('Model.php');

	class User extends Model{

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