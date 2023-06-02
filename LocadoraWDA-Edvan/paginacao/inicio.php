<?php
include '../funcoes/conexao.php';
include '../funcoes/protecao.php';

$sql = "SELECT editora, SUM(alugados_total) AS total_alugueis FROM livro GROUP BY editora";
$result = $conn->query($sql);

$editoras = array();
$alugueis = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $editoras[] = $row['editora'];
    $alugueis[] = $row['total_alugueis'];
  }
}

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

  #graf-gran {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  }

  .graf1, .graf2, .graf3, .graf4 {
    border: solid 2px #009ddd;
    background: white;
    height: 350px;
    width: 600px;
    border-radius: 1rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    margin: 50px;
  }

  #trof{
    margin-left: 16%;
  }

  .divt2 {
    border: solid 2px #009ddd;
    float: left;
    background: white;
    margin-top: 40px;
    margin-left: 8vh;
    margin-bottom: 5vh;
    height: 250px;
    width: 220px;
    border-radius: 1.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
  }

  @media only screen and (max-width: 800px) {

    .graf1, .graf2, .graf3, .graf4 {
      height: 280px;
      width: 90%;
    }

    #trof {
      margin-top: 10%;
      margin-left: 40%;
    }

    .divt2 {
      margin-top: 2%;
      margin-left: 40%;
    }

    @media only screen and (max-width: 600px) {
      .graf1, .graf2, .graf3, .graf4{
        width: 100%;
      }

      #trof{
        margin-top: 10%;
        margin-left: 25%;
      }

      .divt2{
        margin-top: 2%;
        margin-left: 25%;
      }
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
      <canvas style="margin-left: 3px; margin-right: 3px;margin-top: 10px;margin-bottom: 10px;height: 63%;"
        id="grafico-livros-alugados"></canvas>
    </div>

    <div class="graf2">
      <canvas style="margin:auto; width: 85%;height: 63%;" id="grafico-alug"></canvas>
    </div>

    <div class="graf3">
      <canvas style="margin:auto; width: 85%;height: 63%;" id="grafico-entregues" ></canvas>
    </div>
    <div class="graf4">
      <canvas style="margin-left: 3px; margin-right: 3px;margin-top: 10px;margin-bottom: 10px;height: 63%;" id="grafico-editora"></canvas>
    </div>

  </div>
  <div id="graf-peq">
    <div class="divt2" id="trof">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/trophy.png"
        alt="">
      <p style="text-align: center">Livro mais alugado:</p>
      <p style="text-align: center">
        <?php echo $nome_top1 ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/usu.png"
        alt="">
      <p style="text-align: center">Usuário com mais aluguéis:</p>
      <p style="text-align: center">
        <?php echo $aluguel_usu['nome'] ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 24%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/ulti.png"
        alt="">
      <p style="text-align: center">Ultimo livro alugado: </p>
      <p style="text-align: center">
        <?php echo $row5['ulti_alug']; ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/test.png"
        alt="">
      <p style="text-align: center">Total de aluguéis: </p>
      <p style="text-align: center">
        <?php echo $row3['total']; ?>
      </p>
    </div>

    <div class="divt2">
      <img style="margin-left: 17%; margin-right: 30%;margin-top: 3%;margin-bottom: 10px;" src="../imagens/alert.png"
        alt="">
      <p style="text-align: center">Aluguéis ativos: </p>
      <p style="text-align: center">
        <?php echo $row4['ativo']; ?>
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
          backgroundColor: ['#6f95ff'],

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
            '#6f95ff',
            '#5c65c0'
            

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
  <script>
    var ctx3 = document.getElementById('grafico-editora');
    var chart = new Chart(ctx3, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($editoras); ?>,
        datasets: [{
          label: 'Aluguéis por Editora',
          data: <?php echo json_encode($alugueis); ?>,
          backgroundColor: '#386dbd',
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: 'Editora'
            }
          },
          y: {
            display: true,
          
            title: {
              display: true,
              text: 'Quantidade de Aluguéis'
            },
            suggestedMin: 0
          }
        },
        plugins: {
          title: {
            display: true,
            fontSize: 30,
            text: "Aluguéis por Editora",
            fontStyle: "bold",
          }
        },
      }
    });




  </script>
  <script>
    var ctx4 = document.getElementById('grafico-entregues');
    var chart = new Chart(ctx4, {
      type: 'doughnut',
      data: {
        labels: ['entregues no prazo', 'entregues atrasados'],
        datasets: [{
          data: [<?php echo $row5['devolvidos_prazo'] ?>, <?php echo $row5['devolvidos_atraso'] ?>],
          backgroundColor: [
            '#009ddd', '#05d3f8']
        }]
      },
      options: {
        plugins: {
          title: {
            display: true,
            fontSize: 30,
            text: "Estado das baixas",
            fontStyle: "bold",
          }
        }
      },

    });
  </script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>