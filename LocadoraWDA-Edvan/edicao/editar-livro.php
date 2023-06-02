
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css-manual/style-registro.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        .error-message {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }
  </style>
</head>
<body>
    <?php 

    include_once '../funcoes/conexao.php';

    $id = $_GET['id'];

    $consultar = $conn->query("SELECT * FROM livro WHERE id='$id'");

    while($dados = $consultar->fetch_assoc()){
        $nome   = $dados['nome'];
        $autor	= $dados['autor'];
        $data 	= $dados['data_lanca'];
        $estoque 	= $dados['estoque'];
        $editora 	= $dados['editora'];
    }
    ?>
  <div class="container" style="margin-top:3%;">
    <div class="title">Editar Livro <a href="../paginacao/livros.php" style="position: relative;left: 69%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="./funcoes-up/up-livro.php?id=<?php echo $id;?>" method="POST" id="form">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome do livro" value="<?php echo $nome;?>" name="nome" >
          </div>

          <div class="input-box">
            <span class="details">Autor</span>
            <input type="text" placeholder="Autor" value="<?php echo $autor;?>" name="autor" >
          </div>
          <div class="input-box">
            <span class="details">Data de lançamento</span>
            <input type="date" id="data" value="<?php echo $data;?>" name="data" >
          </div>
          <div class="input-box">
            <span class="details">Estoque</span>
            <input type="number" placeholder="Estoque" id="estoque" value="<?php echo $estoque;?>" name="estoque" >
            <div class="error-message" id="estoque-error"></div>
          </div>
          
        </div>
        <div >
        <span class="details">Editora</span>
          <select style="  border-radius: 5px;padding-left: 15px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;" class="form-select" name="editora" id="">
                <option disable ><?php echo $editora;?></option>
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
          <input type="submit" value="Editar">
        </div>
      </form>
      
  </div>
  
<script>
    
    document.getElementById('form').addEventListener('submit', function(event) {
        // Remove mensagens de erro anteriores
        document.getElementById('estoque-error').innerHTML = '';
       

        // Obtém os valores dos campos de entrada
        var estoque = document.getElementById('estoque').value;


        // Verifica se os campos estão vazios
        if (estoque < <?php echo $estoque ?>) {
            document.getElementById('estoque-error').innerHTML = 'O estoque não pode ser menor que o inicial';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('estoque');
            el.style.borderColor = "#e74c3c";

        }
	});
</script>
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>