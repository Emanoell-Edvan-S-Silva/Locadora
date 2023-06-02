
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  
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
  <div class="container" style="margin-top:3%;">
    <div class="title">Cadastrar Livro <a href="../paginacao/livros.php" style="position: relative;left: 63%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="../inserir/add-livros.php" method="POST" id="form">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome do livro" name="nome" id="nome">
            <div class="error-message" id="nome-error"></div>
          </div>

          <div class="input-box">
            <span class="details">Autor</span>
            <input type="text" placeholder="Autor" name="autor" id="autor" >
            <div class="error-message" id="autor-error"></div>
          </div>
          <div class="input-box">
            <span class="details">Data de lançamento</span>
            <input type="date" id="data" name="data" id="data">
            <div class="error-message" id="data-error"></div>

          </div>
          <div class="input-box">
            <span class="details">Estoque</span>
            <input type="number" placeholder="Estoque" name="estoque" id="estoque">
            <div class="error-message" id="estoque-error"></div>
          </div>
          
        </div>
        <div >
        <span class="details">Editora</span>
          <select id="editora" style="border-radius: 5px;padding-left: 15px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;" class="form-select" name="editora" id="">
                <option>selecionar Editora</option>
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
        <div class="error-message" id="editora-error"></div>
    </div>
        
        <div class="button">
          <input type="submit" value="Cadastrar">
        </div>
      </form>
      
  </div>
  <script>
    
    document.getElementById('form').addEventListener('submit', function(event) {
        // Remove mensagens de erro anteriores
        document.getElementById('nome-error').innerHTML = '';
        document.getElementById('autor-error').innerHTML = '';
        document.getElementById('data-error').innerHTML = '';
        document.getElementById('estoque-error').innerHTML = '';
        document.getElementById('editora-error').innerHTML = '';

        // Obtém os valores dos campos de entrada
        var nome = document.getElementById('nome').value;
        var autor = document.getElementById('autor').value;
        var data = document.getElementById('data').value;
        var estoque = document.getElementById('estoque').value;
        var editora = document.getElementById('editora').value;

        // Verifica se os campos estão vazios
        if (nome === '') {
            document.getElementById('nome-error').innerHTML = 'Por favor, insira o nome.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('nome');
            el.style.borderColor = "#e74c3c";

        }
        if (autor === '') {
            document.getElementById('autor-error').innerHTML = 'Por favor, insira o autor.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('autor');
            el.style.borderColor = "#e74c3c";

        }
        if (data === '') {
            document.getElementById('data-error').innerHTML = 'Por favor, insira uma data.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('data');
            el.style.borderColor = "#e74c3c";
        }
        if (estoque === '') {
            document.getElementById('estoque-error').innerHTML = 'Por favor, insira a quantidade.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('estoque');
            el.style.borderColor = "#e74c3c";
        }
        if (editora === 'selecionar Editora') {
            document.getElementById('editora-error').innerHTML = 'Por favor, insira uma editora.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('editora');
            el.style.borderColor = "#e74c3c";
        }
    });
</script>
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>