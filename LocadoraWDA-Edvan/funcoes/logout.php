<?php

if(!isset($_SESSION)){
    session_start();
}
// Destruindo a Sessão
session_destroy();
    header("location: ../index.php");
