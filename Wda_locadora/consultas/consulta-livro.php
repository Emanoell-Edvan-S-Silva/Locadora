
<?php 


	include_once '../funcoes/conexao.php';

	// $consultar = $conn->query("SELECT * FROM livro");

	// while ($dados = $consultar->fetch_assoc()) {

	// 	$id 	= $dados['id'];
	// 	$nome 	= $dados['nome'];
	// 	$autor	= $dados['autor'];
	// 	$editora	= $dados['editora'];
	// 	$qtd 	= $dados['qtd'];
    //     $data_lan = $dados['data_lanca'];


	// 	echo "<tr>";
	// 		echo "<td>$id<td>$nome<td>$autor<td>$editora<td>$data_lan<td>$qtd";
	// 		echo "<td><a href='../edicao/editar-livro.php?id=$id' class='btn'><img src='../imagens/edit.png'></a>";
	// 		echo "<a href='../excluir/deletar-livro.php?id=$id' class='btn'><img src='../imagens/delete.png'></a>";
	// 	echo "<tr>";
	// }

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM livro 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR autor LIKE '%$pesquisa%'
		OR data_lanca LIKE '%$pesquisa%'";
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
			<tr>
				<td class="text-center"><?php echo $dados['id']; ?></td>
				<td class="text-center"><?php echo $dados['nome']; ?></td>
				<td class="text-center"><?php echo $dados['autor']; ?></td>
				<td class="text-center"><?php echo $dados['editora']; ?></td>
				<td class="text-center"><?php echo $dados['data_lanca']; ?></td>
				<td class="text-center"><?php echo $dados['estoque']; ?></td>
				<td class="text-center"><?php echo $dados['alugados_agr']; ?></td>
				<td class="text-center"><?php echo $dados['alugados_total']; ?></td>
				<td ><a href='../edicao/editar-livro.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/editar.png'></a>
				<a href='../confirma/con-delete-li.php?id=<?php echo $dados['id']; ?>'><img src='../imagens/deletar.png'></a>
			</tr>
			<tr></tr>
			<?php
		}
	}

?>