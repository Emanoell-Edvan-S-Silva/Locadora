<?php
// Cnexão com banco de dados
include('conexao.php');

// Condição relacionada com o preenchimento dos campos
if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        // Coleta dos dados
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        // Codigo Executado no Banco de Dados
        $sql_code = "SELECT * FROM locadora WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        //Condição referente ao resultado da pesquisa utilizando o SELECT
        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();
            // Criação da Sessão
            if(!isset($_SESSION)) {
                session_start();
            

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: ../paginacao/inicio.php");
            }
        }
        // Redirecinamento Temporario a uma Pagina em Branco se não existir registro
        else{
            die("Você digitou as informações erradas. <p><a href='../index.php'>Voltar</a</p>");
        }

    }

}