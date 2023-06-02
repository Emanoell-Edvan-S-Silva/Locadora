
<?php 


	include_once '../funcoes/conexao.php';

	// $consultar = $conn->query("SELECT * FROM editora");

	// while ($dados = $consultar->fetch_assoc()) {

	// 	$id 	= $dados['id'];
	// 	$nome 	= $dados['nome'];
	// 	$email	= $dados['email'];
	// 	$telefone	= $dados['telefone'];
	// 	$site 	= $dados['site'];


	// 	echo "<tr>";
	// 		echo "<td>$id<td>$nome<td>$email<td>$telefone<td>$site";
	// 		echo "<td><a href='../edicao/editar-editora.php?id=$id' class='btn'><img src='../imagens/edit.png'></a>";
	// 		echo "<td><a href='../excluir/deletar-editora.php?id=$id' class='btn'><img src='../imagens/delete.png'></a>";
	// 	echo "<tr>";
	// }

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM editora 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR email LIKE '%$pesquisa%'
		OR telefone LIKE '%$pesquisa%'
		OR site LIKE '%$pesquisa%'
		ORDER BY nome;";
	$sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 
	
	if ($sql_query->num_rows == 0) {
		?>
	<tr>
		<td colspan="3">Nenhum resultado encontrado...</td>
	</tr>
	<?php
	} else {
		while($dados = $sql_query->fetch_assoc()) {
			?>
			<tr id="tab">
				<td data-cell="ID"><?php echo $dados['id']; ?></td>
				<td data-cell="Nome"><?php echo $dados['nome']; ?></td>
				<td data-cell="Email"><?php echo $dados['email']; ?></td>
				<td data-cell="Telefone"><?php echo $dados['telefone']; ?></td>
				<td data-cell="Site"><?php echo $dados['site']; ?></td>
				<td><a href='../edicao/editar-editora.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/editar.png'></a></td>
				<td><a href='../confirma/con-delete-edi.php?id=<?php echo $dados['id']; ?>'><img src='../imagens/deletar.png'></a></td>
			</tr>
			
			<?php
		}
	}


?>
<html>
	<link rel="stylesheet" href="../paginacao/style.css">
</html>