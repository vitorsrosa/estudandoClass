<?php
include('Sql.php');
class Produto extends Model{

	public function listAll(){
		
		$sql = new Sql();

		return $sql->select("SELECT * FROM produto WHERE codproduto = :cod",[
			':cod'=>2]
		);
	}
}
?>