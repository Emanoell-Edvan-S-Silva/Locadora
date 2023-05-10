
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css-manual/style-registro.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <div class="container" style="margin-top:3%;">
    <div class="title">Cadastrar Livro <a href="../paginacao/livros.php" style="position: relative;left: 63%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="../inserir/add-livros.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome do livro" name="nome" required>
          </div>

          <div class="input-box">
            <span class="details">Autor</span>
            <input type="text" placeholder="Autor" name="autor" required>
          </div>
          <div class="input-box">
            <span class="details">Data de lançamento</span>
            <input type="date" id="data" name="data" required>
          </div>
          <div class="input-box">
            <span class="details">Estoque</span>
            <input type="number" placeholder="Estoque" name="estoque" required>
          </div>
          
        </div>
        <div >
        <span class="details">Editora</span>
          <select style="border-radius: 5px;padding-left: 15px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;" class="form-select" name="editora" id="">
                <option disable >selecionar Editora</option>
                <?php 
                    include_once '../funcoes/conexao.php';
                    $sql_s = "SELECT * FROM editora";
                    $result = $conn->query($sql_s);
                    while($row_editoras = $result->fetch_assoc()){ ?>
                <option value="<?php echo $row_editoras['nome']; ?>"><?php echo $row_editoras['nome'] ?></option>
                <?php     
                    }
                ?>
            </select>
        </div>
    </div>
        
        <div class="button">
          <input type="submit" value="Cadastrar">
        </div>
      </form>
      
  </div>
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>