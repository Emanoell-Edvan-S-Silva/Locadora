<?php
include '../funcoes/conexao.php';
include '../funcoes/protecao.php';

$sql_usu = "SELECT *, max(alugados) FROM usuarios";
$busca_usu = $conn->query($sql_usu);
$aluguel_usu = $busca_usu->fetch_array();



@$cont1 = $conn->query("SELECT COUNT(id) AS prazo FROM aluguel WHERE status = 'No Prazo'");
$row1 = $cont1->fetch_array();

@$cont2 = $conn->query("SELECT COUNT(id) AS atraso FROM aluguel WHERE status = 'atrasado'");
$row2 = $cont2->fetch_array();

@$soma = $conn->query("SELECT SUM(alugados_total) AS total FROM livro");
$row3 = $soma->fetch_array();

@$soma2 = $conn->query("SELECT SUM(alugados_agr) AS ativo FROM livro");
$row4 = $soma2->fetch_array();

@$sql1 = $conn->query("SELECT * FROM controle_devo WHERE id_controle='1'");
$row5 = $sql1->fetch_array();

// Select para achar o top 3 de alugueis
$sql1 = "SELECT *, max(alugados_total) FROM livro";
$busca1 = $conn->query($sql1);
$top1 = $busca1->fetch_array();

$id_top1 = $top1['id'];
$nome_top1 = $top1['nome'];
$alu_top1 = $top1['alugados_total'];

$sql2 = "SELECT *, max(alugados_total) FROM livro WHERE id !=$id_top1";
$busca2 = $conn->query($sql2);
$top2 = $busca2->fetch_array();

$id_top2 = $top2['id'];
$nome_top2 = $top2['nome'];
$alu_top2 = $top2['alugados_total'];

$sql3 = "SELECT *, max(alugados_total) FROM livro WHERE id !=$id_top1 AND id !=$id_top2 ";
$busca3 = $conn->query($sql3);
$top3 = $busca3->fetch_array();

$nome_top3 = $top3['nome'];
$alu_top3 = $top3['alugados_total'];





?>
<style>
  body {
    background-image: url(../imagens/blue-novo.png);
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    background-color: #4070f4;
  }

  #customers {
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;

  }

  #customers td,
  #customers th {
    border: 1px solid #ddd;
    padding: 8px;
  }

  #customers tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  #customers tr:hover {
    background-color: #ddd;
  }

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

  #graf-gran {
    position: absolute;
    float: left;
    display: block;
    max-width: 100%;
  }

  #graf-peq {
    position: absolute;
    margin-top: 50vh;
    float: left;
    display: block;
  }

  .graf1 {
    float: left;
    background: white;
    margin-left: 13vh;
    height: 350px;
    width: 600px;
    border-radius: 1.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  }

  .graf2 {
    float: right;
    background: white;
    margin-left: 15vh;
    height: 350px;
    width: 600px;
    border-radius: 1.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  }

  .divt2 {
    float: left;
    background: white;
    margin-top: 40px;
    margin-left: 6vh;
    margin-bottom: 5vh;
    height: 240px;
    width: 200px;
    border-radius: 1.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  }

  @media only screen and (max-width: 800px) {

    #graf-gran,
    #graf-peq {
      position: absolute;
      width: 100%;
      height: 100%;
    }

    .graf1 {
      position: absolute;
      height: 280px;
      width: 90%;
      top: 10px;
      left: -19%;
      padding: 1%;
      color: #fff;
      overflow-x: hidden;
    }

    #grafico-livros-alugados {
      height: 100vh;
      width: 100vh;
      padding: -200px;
    }

    .graf2 {
      position: absolute;
      height: 280px;
      width: 90%;
      margin-top: 90%;
      left: -22%;
      padding: 5%;
      color: #fff;
      overflow-x: hidden;
    }

    #trof {
      margin-top: 77%;
    }

    .divt2 {
      margin-top: -5%;
      margin-left: 30%;
    }
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css-manual/pag1.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="shortcut icon" href="../imagens/book.ico" type="image/x-icon">

  <title>Inicio</title>
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
            <a class="nav-link active" aria-current="page" href="inicio.php"><i class='bx bxs-home'></i>Início</a>
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
            <a class="nav-link" href="aluguel.php"><i class='bx bxs-bookmarks'></i>Aluguel</a>
          </li>

        </ul>
        <a href="../funcoes/logout.php"><img src="../imagens/log-in.png" alt=""></a>
      </div>
    </div>
  </nav>
  <h3 style="margin-top:1%;" class="text-center">DashBoard</h3>
  <br>
  <div id="graf-gran">
    <div class="graf1">
      <canvas style="margin-left: 3px; margin-right: 3px;margin-top: 10px;margin-bottom: 10px;"
        id="grafico-livros-alugados"></canvas>
    </div>

    <div class="graf2">
      <canvas style="margin:auto" id="grafico-alug"></canvas>
    </div>
  </div>
  <div id="graf-peq">
    <div class="divt2" id="trof">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/trofeu.png"
        alt="">
      <p style="text-align: center">Livro mais alugado:</p>
      <p style="text-align: center">
        <?php echo $nome_top1 ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/trofeu2.png"
        alt="">
      <p style="text-align: center">Usuário com mais aluguéis:</p>
      <p style="text-align: center">
        <?php echo $aluguel_usu['nome'] ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/lista.png"
        alt="">
      <p style="text-align: center">Total de aluguéis: </p>
      <p style="text-align: center">
        <?php echo $row3['total']; ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/ativo.png"
        alt="">
      <p style="text-align: center">Aluguéis ativos: </p>
      <p style="text-align: center">
        <?php echo $row4['ativo']; ?>
      </p>
    </div>
    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/prazo.png"
        alt="">
      <p style="text-align: center">Devolvidos no prazo: </p>
      <p style="text-align: center">
        <?php echo $row5['devolvidos_prazo']; ?>
      </p>
    </div>
    <div class="divt2" id="ult">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/atrasado.png"
        alt="">
      <p style="text-align: center">Devolvidos com atraso: </p>
      <p style="text-align: center">
        <?php echo $row5['devolvidos_atraso']; ?>
      </p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const ctx = document.getElementById('grafico-livros-alugados');

    new Chart(ctx, {
      type: 'bar',

      data: {
        labels: ['<?php echo $nome_top2 ?>', '<?php echo $nome_top1 ?>', '<?php echo $nome_top3 ?>'],
        datasets: [{
          label: 'alugados',
          data: [<?php echo $alu_top2 ?>, <?php echo $alu_top1 ?>, <?php echo $alu_top3 ?>],
          // borderWidth: 1,
          backgroundColor: ['#00caf8'],

        }]
      },
      options: {
        
        plugins: {
          title: {
            display: true,
            fontSize: 30,
            text: "Livros mais alugados",
            fontStyle: "bold",
          }
        },
        


        scales: {
          
          y: {
            beginAtZero: true
          }
          
        }
      }
    });
  </script>

  <script>
    const ctx2 = document.getElementById('grafico-alug');

    new Chart(ctx2, {
      type: 'doughnut',
      data: {
        labels: [
          'Aluguéis atrasados', 'Aluguéis no prazo'
        ],
        datasets: [{
          label: 'Quantidade',
          data: [<?php echo $row2['atraso'] ?>, <?php echo $row1['prazo'] ?>],
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 235, 130)'

          ],
          hoverOffset: 4
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            fontSize: 30,
            text: "Estado dos aluguéis",
            fontStyle: "bold",
          }
        },
      }
    });

  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>