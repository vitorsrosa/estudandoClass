<?php
	
	class Sql{

		const HOSTNAME = "localhost";
		const USERNAME = "root";
		const PASSWORD = "";
		const DBNAME = "dbbijus";

		private $conn;

		public function __construct()
		{
			try{
				//conectando com o banco de dados
				$this->conn = new PDO("mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME,
					Sql::USERNAME,
					Sql::PASSWORD
				);

				//tratando erros
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e) {
				//fala o erro case de errado
				echo 'ERROR: ' .$e->getMessage();
			}
		}

		/*
			Função para bindar os parametros da consulta caso tenha
			Recebe o statement (No caso prepare, a consulta)
			Recebe o nome do campo
			Recebe o valor do campo
			Foreach pois pode receber mais que um parametro
		*/
		private function setParams($statement, $parameters = array())
		{

			foreach ($parameters as $key => $value) {

				$this->bindParam($statement, $key, $value);

			}

		}

		/*
			Função para bindar os parametros da consulta caso tenha
			Recebe o statement (No caso prepare, a consulta)
			Recebe o nome do campo
			Recebe o valor do campo
			
		*/
		private function bindParam($statement, $key, $value)
		{
			$statement->bindParam($key, $value);
		}

		
		/*
			Fazendo metodo de select, pois ja e passado a query e os parametros,
			e ele ja consulta e traz o resultado sempre
			Automatizado
			(o ":array" no final, é um cast para array (forçar que a saida seja um array))
		*/
		public function select($rawQuery, $params = array()):array
		{

			//preparando a consulta
			$stmt = $this->conn->prepare($rawQuery);

			//passando os parametros da consulta
			$this->setParams($stmt, $params);

			//executando a consulta
			$stmt->execute();

			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} 
	}

?>