<?php 
include '../funcoes/conexao.php';
include '../funcoes/protecao.php';

@$soma2 = $conn->query("SELECT SUM(alugados_total) AS total FROM livro"); 
$row2 = $soma2->fetch_array();

@$soma = $conn->query("SELECT SUM(alugados_agr) AS qtd FROM livro"); 
$row = $soma->fetch_array();

@$cont1 = $conn->query("SELECT COUNT(id) AS alug FROM aluguel"); 
$row3 = $cont1->fetch_array();

@$cont2 = $conn->query("SELECT COUNT(id) AS atraso FROM atrasos"); 
$row4 = $cont2->fetch_array();

// Select para achar o top 1 de alugueis
        $sql1 = "SELECT *, max(alugados_total) FROM livro";
        $busca1 = $conn->query($sql1);
        $top1 = $busca1->fetch_array();

        $id_top1 =$top1['id'];
        $nome_top1 = $top1['nome'];
        $alu_top1 = $top1['alugados_total'];

        $sql2 = "SELECT *, max(alugados_total) FROM livro WHERE id !=$id_top1";
        $busca2 = $conn->query($sql2);
        $top2 = $busca2->fetch_array();

        $id_top2 =$top2['id'];
        $nome_top2 = $top2['nome'];
        $alu_top2 = $top2['alugados_total'];

        $sql3 = "SELECT *, max(alugados_total) FROM livro WHERE id !=$id_top1 AND id !=$id_top2 ";
        $busca3 = $conn->query($sql3);
        $top3 = $busca3->fetch_array();

        $nome_top3 = $top3['nome'];
        $alu_top3 = $top3['alugados_total'];





?>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: blue;
  color: white;
}
#customers td {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imagens/book.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Inicio</title>
</head>
<body >
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4169E1;">
  <div class="container-fluid">
    <a class="navbar-brand" style="margin-left: 3% ;" href="#"><img src="../imagens/Wda-logo.png" alt="Logo" width="40" height="24" class="d-inline-block align-text-top">Locadora</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="margin-left: 20% ;" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio.php">Inicio</a>
        </li>
        <li class="nav-item" style="margin-left: 10% ;">
          <a class="nav-link" href="usuarios.php">Usuarios</a>
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

<h3 style="margin-top:1%;" class="text-center">DashBoard</h3>
<br>
<div style="margin-left: 16%;">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Livro", "Alugueis", { role: "style" } ],        
        ["<?php echo $nome_top1?>", <?php echo $alu_top1 ?>, "blue"],
        ["<?php echo $nome_top2?>", <?php echo $alu_top2 ?>, "blue"],
        ["<?php echo $nome_top3?>", <?php echo $alu_top3 ?>, "blue"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Top 3 de livros mais alugados",
        width: 900,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "center" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 900px; height: 300px;"></div>
</div>

<div class="">
<table style="margin-left: 43%;margin-top: 10%;" id="customers" width=300 height=100>
    <tr>
        <th>&nbsp;</th>
        <th>Quantidades</th>
    </tr>
    <tr>
        <td>Total Alugados</td>
        <td><?php echo $row2['total']; ?></td>
    </tr>
    <tr>
        <td>Alugados agora</td>
        <td><?php echo $row['qtd']; ?></td>
    </tr>
    <tr>
        <td>Alugueis no Prazo</td>
        <td style="color: green;"><?php echo $row3['alug']; ?></td>
    </tr>
    <tr>
        <td>Alugueis atrasados</td>
        <td style="color: red;"><?php echo $row4['atraso']; ?></td>
    </tr>
</table>
</div>
<div style="margin-left: 43%;margin-top: 20%;" ></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>