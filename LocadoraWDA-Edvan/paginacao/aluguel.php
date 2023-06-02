<?php

include '../funcoes/conexao.php';
include '../funcoes/protecao.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css-manual/pag1.css">
  <link rel="shortcut icon" href="./imagens/book.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

  <title>Aluguel</title>

  <style>
    body {
      background-image: url(../imagens/blue-novo.png);
      background-position: center center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-color: #4070f4;
    }

    tr {
      text-align: center;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1919e6;">
    <div class="container-fluid">
      <a class="navbar-brand" style="margin-left: 3% ;" href="#"><img src="../imagens/logo.png" alt="Logo" width="100"
          height="45" class="d-inline-block align-text-top"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" style="margin-left: 15% ;" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" id="barra" style="--bs-scroll-height: 100px;">
          <li class="nav-item" style="white-space: nowrap;font-weight: bold">
            <a class="nav-link" aria-current="page" href="inicio.php"><i class='bx bxs-home'></i>Início</a>
          </li>
          <li class="nav-item" style="margin-left: 10%; white-space: nowrap;font-weight: bold">
            <a class="nav-link" href="usuarios.php"><i class='bx bxs-user'></i>Usuários</a>
          </li>
          <li class="nav-item" style="margin-left: 10%; white-space: nowrap;font-weight: bold">
            <a class="nav-link" href="livros.php"><i class='bx bxs-book-bookmark'></i>Livros</a>
          </li>
          <li class="nav-item" style="margin-left: 10%; white-space: nowrap;font-weight: bold">
            <a class="nav-link" href="editoras.php"><i class='bx bxs-building-house'></i>Editoras</a>
          </li>
          <li class="nav-item" style="margin-left: 10%; white-space: nowrap;font-weight: bold">
            <a class="nav-link active" href="aluguel.php"><i class='bx bxs-bookmarks'></i>Aluguel</a>
          </li>

        </ul>
        <a href="../funcoes/logout.php"><img src="../imagens/log-in.png" alt=""></a>
      </div>
    </div>
  </nav>
  <br>
  <div class="container-fluid" id="alug tabela">
    <table>
      <tr>
        <td style="width: 200px; display: inline-block; border-right: solid black 3px;">
          <h4 style="font-weight: bold;margin-left:1%;"><i class='bx bxs-bookmarks'></i>Aluguel</h4>
        </td>
        <td style="width: 35px;"></td>
        <td><a href="../cadastros/cadastro-aluguel.php" class="btn btn-primary" role="button"
            style=" border-radius: 20px; box-shadow: 0 2px 5px rgba(0,0,0,.5); ">Novo +</a>
        </td>
      </tr>
    </table>
    <table id="tsup">
      <tr>
      <td><a href="../paginacao/aluguel.php?busca2=1" class="btn btn-success" role="button"
            style=" border-radius: 20px; box-shadow: 0 2px 5px rgba(0,0,0,.5); ">Entregues</a>
        </td>
        <td>
          <form action="">
        <td>
          <input class="form-control me-2" name="busca" placeholder="Pesquisa" type="text">
        </td>
        <td>
          <button style="display: flex;" class="btn btn-primary" type="submit"><img src="../imagens/search.png" alt=""
              srcset=""></button>
        </td>
        </form>
        </td>
      </tr>
    </table>
    <br>
    <table id="tinf" class="table table-borderless table-hover">
      <thead>
        <tr class="table-dark" id="cabeca" style="text-align: center;">
          <th>ID</th>
          <th>Nome Cliente</th>
          <th>Nome Livro</th>
          <th>Autor Livro</th>
          <th>Editora Livro</th>
          <th>Data de Aluguel</th>
          <th>Data de Devolução</th>
          <th>Status</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php include_once '../consultas/consulta-aluguel.php' ?>
        </tr>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>