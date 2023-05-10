
<?php 


	include_once '../funcoes/conexao.php';

	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM aluguel 
		WHERE id LIKE '%$pesquisa%' 
        OR id_cliente LIKE '%$pesquisa%'
		OR nome_cliente LIKE '%$pesquisa%'
        OR nome_livro LIKE '%$pesquisa%'
        OR autor_livro LIKE '%$pesquisa%'
		OR editora_livro LIKE '%$pesquisa%'";

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
				<td><?php echo $dados['id']; ?></td>
				<td><?php echo $dados['nome_cliente']; ?></td>
				<td><?php echo $dados['nome_livro']; ?></td>
				<td class="text-center"><?php echo $dados['autor_livro']; ?></td>
				<td class="text-center"><?php echo $dados['editora_livro']; ?></td>
				<td class="text-center"><?php echo $dados['data_alu']; ?></td>
				<td class="text-center"><?php echo $dados['data_devo']; ?></td>

				<td><a href='../confirma/con-baixa.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/entregue2.png'></a>
				<a href='../inserir/add-atraso.php?id=<?php echo $dados['id']; ?>'><img src='../imagens/atraso.png'></a>
			</tr>
			<tr></tr>
			<?php
		}
	}
?>