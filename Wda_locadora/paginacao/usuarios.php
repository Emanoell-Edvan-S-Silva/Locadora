<?php 
include '../funcoes/protecao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css-manual/pag.css">
    <link rel="shortcut icon" href="./imagens/book.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Usuarios</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4169E1;">
  <div class="container-fluid">
    <a class="navbar-brand" style="margin-left: 3% ;" href="#"><img src="../imagens/Wda-logo.png" alt="Logo" width="40" height="24" class="d-inline-block align-text-top">Locadora</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left: 20% ;" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" id="barra" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="inicio.php">Inicio</a>
        </li>
        <li class="nav-item" style="margin-left: 10% ;">
          <a class="nav-link active" href="usuarios.php">Usuarios</a>
        </li>
        <li class="nav-item" style="margin-left: 10% ;">
          <a class="nav-link" href="livros.php">Livros</a>
        </li>
        <li class="nav-item" style="margin-left: 10% ;">
          <a class="nav-link" href="editoras.php">Editoras</a>
        </li>
        <li class="nav-item" style="margin-left: 10% ;">
          <a class="nav-link" href="aluguel.php">Aluguel</a>
        </li>
        <li class="nav-item" style="margin-left: 10% ;">
          <a class="nav-link" href="atrasos.php">Atrasos</a>
        </li>
        
      </ul>
      <a href="../funcoes/logout.php"><img src="../imagens/log-in.png" alt=""></a>
    </div>
  </div>
</nav>


<br>

	<div class="container-xxl">
		<table class="table table-striped table-hover">
			<thead>
        <th><h5>Usuarios</h5></th>
        <th><a href="../cadastros/cadastro-usuario.php"><button type="button" href="#" class="btn btn-primary" style=" border-radius: 20px; box-shadow: 0 2px 5px rgba(0,0,0,.5); ">Novo +</button></a></th>
        <th></th>
        <th> 
          <!-- input de pesquisa -->
            <form  action="">
              <th>
              <input  class="form-control me-2"  name="busca" value="" placeholder="Pesquisa" type="text">
              </th>
              <th>
              <button style="display: flex;" class="btn btn-primary"  type="submit"><img src="../imagens/search.png" alt="" srcset=""></button>
              </th>
            </form>
          </th>
          <!-- tabela -->
        <tr class="table-dark">
					<th >ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Celular</th>
          <th>Endereço</th>
          <th>CPF</th>
          <th>Aluguel ativo</th>
				</tr>
			</thead>

			<tbody>
        <!-- dados da consulta -->
				<tr><?php include_once '../consultas/consulta-usuario.php' ?></tr>
			</tbody>

		</table>

</div>	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
