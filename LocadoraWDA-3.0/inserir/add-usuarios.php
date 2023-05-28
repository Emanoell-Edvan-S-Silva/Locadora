<?php 
 
include '../funcoes/conexao.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email  = isset($_POST['email']) == true ?$_POST['email']:"";
	$celular  = isset($_POST['celular']) == true ?$_POST['celular']:"";
	$endereco  = isset($_POST['endereco']) == true ?$_POST['endereco']:"";
	$cpf  = isset($_POST['cpf']) == true ?$_POST['cpf']:"";

	//inserir dados no banco de dados.

	$sql = "INSERT INTO usuarios (nome, email, celular, endereco, cpf, alugados) VALUES ('$nome','$email','$celular','$endereco','$cpf', 0)";

		if ($conn->query($sql) == TRUE) {

			header('Location: ../paginacao/usuarios.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>