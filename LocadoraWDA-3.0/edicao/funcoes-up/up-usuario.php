<?php 
	
	include_once '../../funcoes/conexao.php';

	$id = $_GET['id'];
    $nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$email  = isset($_POST['email']) == true ?$_POST['email']:"";
	$celular  = isset($_POST['celular']) == true ?$_POST['celular']:"";
	$endereco  = isset($_POST['endereco']) == true ?$_POST['endereco']:"";
	$cpf  = isset($_POST['cpf']) == true ?$_POST['cpf']:"";

	$alterar = $conn->query("UPDATE usuarios SET nome ='$nome', email ='$email', celular ='$celular', endereco ='$endereco', cpf ='$cpf' WHERE id='$id'");
	
	if(mysqli_affected_rows($conn) > 0){
		header("location: ../../paginacao/usuarios.php");
	}
	
?>