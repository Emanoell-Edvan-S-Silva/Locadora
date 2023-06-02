<?php 
include '../funcoes/conexao.php';
$id = $_GET['id'];


$sql = "SELECT alugados_agr FROM livro WHERE id='$id'";
@$sql_query = $conn->query($sql);
@$dados = $sql_query->fetch_assoc(); 



if($dados['alugados_agr'] > 0){
    header('location: ../confirma/erro-delete-li.php');
    exit;
}
else{
    header('location: ../confirma/con-delete-li.php?id='.$id);
}


?>