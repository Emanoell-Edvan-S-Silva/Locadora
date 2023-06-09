<?php 
include_once '../funcoes/conexao.php';
$data_atual = date('Y-m-d', strtotime('-3 hour'));
?>
<!DOCTYPE html>

<html lang="pt-br" dir="ltr">
  <head>
    <meta charset="UTF-8">

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
    <div class="title">Novo Aluguel <a href="../paginacao/aluguel.php" style="position: relative;left: 64%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="../inserir/add-aluguel.php" method="POST" id="form">
        
        <div class="user-details">
        <div class="input-box">
            <span class="details">Nome Cliente</span>
            <select id="nomecli" style="font-size: 16px; height: 45px; width: 100%;border-radius: 5px;padding-left: 15px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;" class="form-select" name="usuario" id="">
                <option>Selecionar Cliente</option>
                <?php 
                    
                    $sql_s = "SELECT * FROM usuarios";
                    $result = $conn->query($sql_s);
                    while($row_usuario = $result->fetch_assoc()){ ?>
                <option value="<?php echo $row_usuario['id']; ?>"><?php echo $row_usuario['nome'] ?></option>
                <?php     
                    }
                ?>
            </select>
            <div class="error-message" id="nomecli-error"></div>
          </div>
            <div class="input-box">
            <span class="details">Nome Livro</span>
            <select id="nomeli" style="font-size: 16px; height: 45px; width: 100%;border-radius: 5px;padding-left: 15px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;" class="form-select" name="livro" id="">
                <option>Selecionar Livro</option>
                <?php 
                    include_once '../funcoes/conexao.php';
                    $sql_s = "SELECT * FROM livro";
                    $result = $conn->query($sql_s);
                    while($row_usuario = $result->fetch_assoc()){ ?>
                <option value="<?php echo $row_usuario['id']; ?>"><?php echo $row_usuario['nome'] ?></option>
                <?php     
                    }
                ?>
            </select>
            <div class="error-message" id="nomeli-error"></div>
          </div>
          <div class="input-box">
            <span class="details">Data de Aluguel</span>
            <input type="date" id="data" value="<?php echo $data_atual ?>" name="data_alu" disabled>
          </div>
          <div class="input-box">
            <span class="details">Data de Entrega</span>
            <input type="date" id="dataen"  name="data_entreg" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+30 days')); ?>">
            <div class="error-message" id="data-error"></div>
          </div>
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Cadastrar">
        </div>
      </form>
    </div>
  </div>
  <script>
    
    
    document.getElementById('form').addEventListener('submit', function(event) {
        // Remove mensagens de erro anteriores
        document.getElementById('nomecli-error').innerHTML = '';
        document.getElementById('nomeli-error').innerHTML = '';
        document.getElementById('data-error').innerHTML = '';

        // Obtém os valores dos campos de entrada
        var nomecli = document.getElementById('nomecli').value;
        var nomeli = document.getElementById('nomeli').value;
        var data = document.getElementById('dataen').value;

        // Verifica se os campos estão vazios
        if (nomecli === 'Selecionar Cliente') {
            document.getElementById('nomecli-error').innerHTML = 'Por favor, insira o nome.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('nomecli');
            el.style.borderColor = "#e74c3c";

        }
        if (nomeli === 'Selecionar Livro') {
            document.getElementById('nomeli-error').innerHTML = 'Por favor, insira o nome do livro.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('nomeli');
            el.style.borderColor = "#e74c3c";

        }
        if (data === '') {
            document.getElementById('data-error').innerHTML = 'Por favor, insira uma data.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('dataen');
            el.style.borderColor = "#e74c3c";
        }
        
    });
</script>
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>