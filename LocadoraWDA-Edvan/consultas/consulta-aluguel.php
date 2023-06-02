
<?php 


	include_once '../funcoes/conexao.php';
	$dataAtual = date('Y-m-d');

	$sql_status = "SELECT id, status, data_devo FROM aluguel";
	$sql_query_stts = $conn->query($sql_status) or die("ERRO ao consultar STATUS! " . $conn->error); 

	while($dad_status = $sql_query_stts->fetch_assoc()){

		if($dad_status['status'] == "Atrasado" || $dad_status['status'] == "No Prazo"){
		$prazoEntrega = $dad_status["data_devo"];
		$id_stts = $dad_status["id"];

			if ($prazoEntrega < $dataAtual) {
				$alterar_stats = $conn->query("UPDATE aluguel SET status='Atrasado' WHERE id = '$id_stts'");
		   }
		   	else {
				$alterar_stats = $conn->query("UPDATE aluguel SET status='No Prazo' WHERE id = '$id_stts'");
	   		}	
	   	
			}
			else{
				
			}
		

	}
	


	@$pesquisa2 = $conn->real_escape_string($_GET['busca2']);
	if($pesquisa2 == "1"){
		$sql_code = "SELECT id, id_cliente, nome_cliente, nome_livro, autor_livro, editora_livro, data_devo, DATE_FORMAT(data_alu, '%d/%m/%Y') as data_alug, DATE_FORMAT(data_devo, '%d/%m/%Y') as data_devol, status
		FROM aluguel
		WHERE status LIKE '%(no prazo)%'
		OR status LIKE '%(atrasado)%'";
	}
	else{
		@$pesquisa = $conn->real_escape_string($_GET['busca']);
		$sql_code = "SELECT id, id_cliente, nome_cliente, nome_livro, autor_livro, editora_livro, data_devo, DATE_FORMAT(data_alu, '%d/%m/%Y') as data_alug, DATE_FORMAT(data_devo, '%d/%m/%Y') as data_devol, status
			FROM aluguel 
			WHERE id LIKE '%$pesquisa%' 
			OR id_cliente LIKE '%$pesquisa%'
			OR nome_cliente LIKE '%$pesquisa%'
			OR nome_livro LIKE '%$pesquisa%'
			OR autor_livro LIKE '%$pesquisa%'
			OR editora_livro LIKE '%$pesquisa%'
			OR data_alu LIKE '%$pesquisa%'
			OR data_devo LIKE '%$pesquisa%'
			OR status LIKE '%$pesquisa%'
			ORDER BY nome_cliente;";
	}



	

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
				<td data-cell="Nome Cliente"><?php echo $dados['nome_cliente']; ?></td>
				<td data-cell="Nome Livro"><?php echo $dados['nome_livro']; ?></td>
				<td data-cell="Autor Livro"><?php echo $dados['autor_livro']; ?></td>
				<td data-cell="Editora Livro"><?php echo $dados['editora_livro']; ?></td>
				<td data-cell="Data de Aluguel"><?php echo $dados['data_alug']; ?></td>
				<td data-cell="Data de Devolução"><?php echo $dados['data_devol']; ?></td>
				<?php if($dados['status'] == "Atrasado") {?>
				<td class="table-danger" data-cell="Status"><?php echo $dados['status']; ?></td>
				<?php }else if($dados['status'] == "No Prazo"){?>
				<td class="table-success" data-cell="Status"><?php echo $dados['status']; ?></td>
				<?php } else{?>
				<td class="text-center" data-cell="Status"><?php echo $dados['status']; ?></td>
				<?php }?>

				<?php if($dados['status'] == "Atrasado" || $dados['status'] == "No Prazo"){?>
				<td><a href='../confirma/con-baixa.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/entregue2.png'></a></td>
				<?php }else { ?>
					<td><a href='../confirma/con-exclu-alu.php?id=<?php echo $dados['id']; ?>' class='btn'><img src='../imagens/deletar.png'></a></td>
					<?php } ?>
			</tr>

			<?php
		}
	}
?>
<html>
	<link rel="stylesheet" href="../paginacao/style.css">
</html>