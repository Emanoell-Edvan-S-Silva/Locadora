<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['id'])){
    // Se a sessão ja tiver sido encerrada aparece a mensagem a baixo onde existe um link para pessoa logar novamente
    die("Você não pode entrar pois não está logado. <p><a href='../index.php'>Voltar</a</p>");
}