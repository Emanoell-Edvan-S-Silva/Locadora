<?php 
 
include '../funcoes/conexao.php';

	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$autor  = isset($_POST['autor']) == true ?$_POST['autor']:"";
	$data  = isset($_POST['data']) == true ?$_POST['data']:"";
	$estoque  = isset($_POST['estoque']) == true ?$_POST['estoque']:"";
	$editora  = isset($_POST['editora']) == true ?$_POST['editora']:"";


	//inserir dados no banco de dados.

	$sql = "INSERT INTO livro (nome, autor, editora, data_lanca, estoque) VALUES ('$nome','$autor','$editora','$data','$estoque')";

		if ($conn->query($sql) == TRUE) {

			header('Location: ../paginacao/livros.php');

		} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();

?>