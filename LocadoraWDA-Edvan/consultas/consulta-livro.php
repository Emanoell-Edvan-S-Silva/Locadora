
<?php 


	include_once '../funcoes/conexao.php';

	$sql_status = "SELECT id, estado, estoque FROM livro";
	$sql_query_stts = $conn->query($sql_status) or die("ERRO ao consultar STATUS! " . $conn->error); 

	while($dad_status = $sql_query_stts->fetch_assoc()){
		$estoque = $dad_status["estoque"];
		$id_livro = $dad_status["id"];
		

			if ($estoque > 0) {
				$alterar_estado = $conn->query("UPDATE livro SET estado='Disponivel' WHERE id = '$id_livro'");
		   }
		   	else {
				$alterar_estado = $conn->query("UPDATE livro SET estado='Indisponivel' WHERE id = '$id_livro'");
	   		}	
	   	
		
		}

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT id,nome,autor,editora, DATE_FORMAT(data_lanca, '%d/%m/%Y') as data_lancam, estoque, estado, alugados_agr, alugados_total
		FROM livro 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR autor LIKE '%$pesquisa%'
		OR editora LIKE '%$pesquisa%'
		OR data_lanca LIKE '%$pesquisa%'
		OR estoque LIKE '%$pesquisa%'
		OR estado LIKE '%$pesquisa%'
		OR alugados_agr LIKE '%$pesquisa%'
		OR alugados_total LIKE '%$pesquisa%'
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
			<tr id="tab" style="text-align: center;">
				<td data-cell="ID"><?php echo $dados['id']; ?></td>
				<td data-cell="Nome"><?php echo $dados['nome']; ?></td>
				<td data-cell="Autor"><?php echo $dados['autor']; ?></td>
				<td data-cell="Editora"><?php echo $dados['editora']; ?></td>
				<td data-cell="Data de Lançamento"><?php echo $dados['data_lancam']; ?></td>
				<td data-cell="Estoque"><?php echo $dados['estoque']; ?></td>
				<td data-cell="Estado"><?php echo $dados['estado']; ?></td>
				<td data-cell="Alugados Agora"><?php echo $dados['alugados_agr']; ?></td>
				<td data-cell="Total de Alugados"><?php echo $dados['alugados_total']; ?></td>
				
				<td><a href='../edicao/editar-livro.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/editar.png'></a></td>
				<td><a href='../funcoes/teste-livro.php?id=<?php echo $dados['id']; ?>'><img src='../imagens/deletar.png'></a></td>
			</tr>
			<tr></tr>
			<?php
		}
	}

?>
<html>
	<link rel="stylesheet" href="../paginacao/style.css">
</html>