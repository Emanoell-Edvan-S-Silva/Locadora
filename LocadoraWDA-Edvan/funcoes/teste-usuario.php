<?php 
include '../funcoes/conexao.php';
$id = $_GET['id'];


$sql = "SELECT alugados FROM usuarios WHERE id='$id'";
@$sql_query = $conn->query($sql);
@$dados = $sql_query->fetch_assoc(); 



if($dados['alugados'] > 0){
    header('location: ../confirma/erro-delete-usu.php');
    exit;
}
else{
    header('location: ../confirma/con-delete-usu.php?id='.$id);
}


?>