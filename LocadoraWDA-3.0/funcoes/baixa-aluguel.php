<?php

include '../funcoes/conexao.php';
$data_teste = date('Y-m-d');
$data_hj = date('d/m/Y', strtotime('-3 hour'));
$id_alug = $_GET['id'];

$sql_query = $conn->query("SELECT status, id_livro, id_cliente FROM aluguel WHERE id='$id_alug'");
$dados = $sql_query->fetch_array();
$id_livro= $dados['id_livro'];
$id_cliente = $dados['id_cliente'];
$stats = $dados['status'];

$sql2= $conn->query("UPDATE livro SET estoque = estoque + 1, alugados_agr = alugados_agr - 1 WHERE id = $id_livro");
$sql3= $conn->query("UPDATE usuarios SET alugados = alugados - 1 WHERE id = $id_cliente");

if ($stats == "No Prazo"){
    $sql_up = $conn->query("UPDATE aluguel SET status='$data_hj(no prazo)' WHERE id='$id_alug'");
    $sql= $conn->query("UPDATE controle_devo SET devolvidos_prazo = devolvidos_prazo + 1 WHERE id_controle = '1'");
    
}
else{
    $sql_up = $conn->query("UPDATE aluguel SET status='$data_hj(atrasado)' WHERE id='$id_alug'");
    $sql= $conn->query("UPDATE controle_devo SET devolvidos_atraso = devolvidos_atraso + 1 WHERE id_controle = '1'");
}

echo "<script>alert('Baixa feita com SUCESSO!!');javascript:window.location='../paginacao/aluguel.php';</script>"

?>