
<?php 


	include_once '../funcoes/conexao.php';

	// Pesquisa do input
	@$pesquisa = $conn->real_escape_string($_GET['busca']);
	$sql_code = "SELECT * 
		FROM usuarios 
		WHERE id LIKE '%$pesquisa%' 
		OR nome LIKE '%$pesquisa%'
		OR email LIKE '%$pesquisa%'
		OR celular LIKE '%$pesquisa%'
		OR endereco LIKE '%$pesquisa%'
		OR cpf LIKE '%$pesquisa%'
		OR alugados LIKE '%$pesquisa%'
		ORDER BY nome;";


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
			<tr id="tab">
				<td data-cell="ID"><?php echo $dados['id']; ?></td>
				<td data-cell="Nome"><?php echo $dados['nome']; ?></td>
				<td data-cell="Email"><?php echo $dados['email']; ?></td>
				<td data-cell="Celular"><?php echo $dados['celular']; ?></td>
				<td data-cell="Endereço"><?php echo $dados['endereco']; ?></td>
				<td data-cell="CPF"><?php echo $dados['cpf']; ?></td>
				<td class="text-center" data-cell="Aluguéis Ativos"><?php echo $dados['alugados']; ?></td>

				<td><a href='../cadastros/cadastro-alu-usu.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/aluguel1.png'></a></td>
				<td><a href='../edicao/editar-usuario.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/editar.png'></a></td>
				<td><a href='../funcoes/teste-usuario.php?id=<?php echo $dados['id']; ?>'><img src='../imagens/deletar.png'></a></td>
			</tr>
			
			<?php
		}
	}
?>
<html>
	<link rel="stylesheet" href="../paginacao/style.css">
</html>