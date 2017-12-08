<?php

	include('User.php');
	include('Produto.php');

	//instanciando a classe User
	$user = new User();

	//chamando o metodo de validar login
	$user->verificaLogin('gersomee','admin');
	
	//testando com print_r ou var_dump para ver se recebeu os dados
	foreach($_SESSION['usuario'] as $campo):
		echo $campo['NomeLogin'];
	endforeach;
	

	/*
		PARTE DE PRODUTOS
	*/
	$produtos = new Produto();

	$data = $produtos->listaProd(8);//recebendo a lista de produtos

	//foreach para varrer o array que recebemos
	foreach($data as $campo){

?>

	<table border="2">
		<thead>
			<tr>
				<td>Nome</td>
				<td>Valor</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $campo['NomeProduto']?></td>
				<td><?php echo $campo['ValorVendaProduto']?></td>
			</tr>
		</tbody>
	</table>
	
<?php } ?>