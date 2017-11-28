<?php

	include('User.php');
	include('Produto.php');

	$teste = new User();

	$teste->login('admin');

	var_dump($_SESSION['user']);

	$produtos = new Produto();

	$data = $produtos->listAll();

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