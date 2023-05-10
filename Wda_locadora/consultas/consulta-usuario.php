
<?php 


	include_once '../funcoes/conexao.php';

	// Pesquisa do input
	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM usuarios 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR email LIKE '%$pesquisa%'
		OR cpf LIKE '%$pesquisa%'";


	$sql_query = $conn->query($sql_code) or die("ERRO ao consultar! " . $conn->error); 
	
	if ($sql_query->num_rows == 0) {
		?>
	<tr>
		<!-- resultado se nn achar nada -->
		<td colspan="3">Nenhum resultado encontrado...</td>
	</tr>
	<?php
	// Resultado das pesquisa
	} else {
		while($dados = $sql_query->fetch_assoc()) {
			?>
			<tr>
				<td><?php echo $dados['id']; ?></td>
				<td><?php echo $dados['nome']; ?></td>
				<td><?php echo $dados['email']; ?></td>
				<td><?php echo $dados['celular']; ?></td>
				<td><?php echo $dados['endereco']; ?></td>
				<td><?php echo $dados['cpf']; ?></td>
				<td class="text-center"><?php echo $dados['alugados']; ?></td>

				<td>
				<th><a href='../edicao/editar-usuario.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/editar.png'></a></th>
				<th><a href='../cadastros/cadastro-alu-usu.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/aluguel1.png'></a></th>
				<th><a href='../funcoes/teste-usuario.php?id=<?php echo $dados['id']; ?>'><img src='../imagens/deletar.png'></a></th> 
				</td>
			</tr>
			
			<?php
		}
	}

	

?>