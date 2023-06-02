<?php 

	include_once '../funcoes/conexao.php';

	$id = $_GET['id'];

	$deletar = $conn->query("DELETE FROM aluguel WHERE id='$id'");

	if (mysqli_affected_rows($conn) > 0) {

		header("Location: ../paginacao/aluguel.php");
	}
?>