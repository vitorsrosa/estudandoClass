<?php
include('Sql.php');
class Produto extends Model{

	public function listAll(){
		
		//chamando a classe sql para conexao
		$sql = new Sql();

		//retornando o metodo sql->select 
		return $sql->select("SELECT * FROM produto");
	}

	public function listaProd($id){
		//chamando classe para conexao
		$sql = new Sql();

		return $sql->select("SELECT * FROM produto where codproduto = :id",[
			':id'=>$id
		]);
	}
}
?>