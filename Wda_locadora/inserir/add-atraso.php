<?php
include_once '../funcoes/conexao.php';

$id_alug = $_GET['id'];

@$hj = date('Y-m-d', strtotime('-3 hour'));

@$sql = "SELECT * FROM aluguel WHERE id='$id_alug'";

@$sql_query = $conn->query($sql);
@$dados_aluguel = $sql_query->fetch_assoc(); 

if($hj < $dados_aluguel['data_devo']){
 header('Location: ../confirma/con-atraso.php?id=$id_alug');
}
else{
    $id_c = $dados_aluguel['id_cliente'];
    $nome_c = $dados_aluguel['nome_cliente'];
    $id_l = $dados_aluguel['id_livro'];
    $nome_l = $dados_aluguel['nome_livro'];
    $autor_l = $dados_aluguel['autor_livro'];
    $editora_l = $dados_aluguel['editora_livro'];
    $data_alug = $dados_aluguel['data_alu'];
    $data_devo = $dados_aluguel['data_devo'];

    $sql = "INSERT INTO atrasos (id_cliente, nome_cliente, id_livro, nome_livro, autor_livro, editora_livro, data_alug, data_devo) VALUES ('$id_c','$nome_c','$id_l','$nome_l','$autor_l','$editora_l','$data_alug','$data_devo')";

    $sql_delete = $conn->query("DELETE FROM aluguel WHERE id='$id_alug'");


    if ($conn->query($sql) == TRUE) {

        header('Location: ../paginacao/aluguel.php');

    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>