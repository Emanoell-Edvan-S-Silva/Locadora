<?php

include '../funcoes/conexao.php';

$id_alug = $_GET['id'];

$sql_query = $conn->query("SELECT id_livro, id_cliente FROM atrasos WHERE id='$id_alug'");
$dados = $sql_query->fetch_assoc();
$id_livro= $dados['id_livro'];
$id_cliente = $dados['id_cliente'];

$sql2= $conn->query("UPDATE livro SET estoque = estoque + 1, alugados_agr = alugados_agr - 1 WHERE id = $id_livro");
$sql3= $conn->query("UPDATE usuarios SET alugados = alugados - 1 WHERE id = $id_cliente");


$sql_delete = $conn->query("DELETE FROM atrasos WHERE id='$id_alug'");

$sql= $conn->query("UPDATE controle_devo SET devolvidos_atraso = devolvidos_atraso + 1 WHERE id_controle = '1'");

echo "<script>alert('Baixa feita com SUCESSO!!');javascript:window.location='../paginacao/aluguel.php';</script>"

?>