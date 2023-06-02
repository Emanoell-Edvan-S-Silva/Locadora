<?php 
	
	include_once '../../funcoes/conexao.php';

	$id = $_GET['id'];
    $nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email  = isset($_POST['email']) == true ?$_POST['email']:"";
	$telefone  = isset($_POST['telefone']) == true ?$_POST['telefone']:"";
	$site  = isset($_POST['site']) == true ?$_POST['site']:"";

	$alterar = $conn->query("UPDATE editora SET nome ='$nome', email ='$email', telefone ='$telefone', site ='$site' WHERE id='$id'");
	
	if(mysqli_affected_rows($conn) > 0){
		header("location: ../../paginacao/editoras.php");
	}
	
?>