<?php 
 
include '../funcoes/conexao.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email  = isset($_POST['email']) == true ?$_POST['email']:"";
	$telefone  = isset($_POST['telefone']) == true ?$_POST['telefone']:"";
	$site  = isset($_POST['site']) == true ?$_POST['site']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO editora (nome, email, telefone, site) VALUES ('$nome','$email','$telefone','$site')";

		if ($conn->query($sql) == TRUE) {

			header('Location: ../paginacao/editoras.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>