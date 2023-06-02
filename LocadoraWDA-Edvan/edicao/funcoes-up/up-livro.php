<?php 
 
include '../../funcoes/conexao.php';
    

    $id = $_GET['id'];
	$nome 	= isset($_POST['nome']) == true ?$_POST['nome']:"";
	$autor  = isset($_POST['autor']) == true ?$_POST['autor']:"";
	$data  = isset($_POST['data']) == true ?$_POST['data']:"";
	$estoque  = isset($_POST['estoque']) == true ?$_POST['estoque']:"";
	$editora  = isset($_POST['editora']) == true ?$_POST['editora']:"";

    $sql_s = $conn->query("SELECT estoque FROM livro WHERE id='$id'");
    $result = $sql_s->fetch_assoc();

    
        $alterar = $conn->query("UPDATE livro SET nome ='$nome', autor ='$autor', editora ='$editora', data_lanca ='$data', estoque ='$estoque' WHERE id='$id'");
	
        if(mysqli_affected_rows($conn) > 0){
            header("location: ../../paginacao/livros.php");
        }
	
?>