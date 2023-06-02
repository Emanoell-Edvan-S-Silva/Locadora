
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
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
    <div class="title">Cadastrar Usuario <a href="../paginacao/usuarios.php" style="position: relative;left: 55%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="../inserir/add-usuarios.php" method="POST" id="form">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome Completo" name="nome" id="nome">
            <div class="error-message" id="nome-error"></div>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="E-mail" name="email" id="email" >
            <div class="error-message" id="email-error"></div>
          </div>
          <div class="input-box">
            <span class="details">Celular</span>
            <input type="text" id="cel" name="celular" placeholder="(XX) X-XXXX-XXXX" maxlength="15" autocomplete="off" onkeyup="mascara_cel()" >
            <div class="error-message" id="celular-error"></div>
          </div>
          <div class="input-box">
            <span class="details">Endereço</span>
            <input type="text" id="endereco" placeholder="Endereço" name="endereco" >
            <div class="error-message" id="endereco-error"></div>
          </div>
          <div class="input-box">
            <span class="details">CPF</span>
            <input type="text" placeholder="CPF" name="cpf" id="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
            
          </div>
          <div class="input-box">
            <span class="details">Alugados</span>
            <input type="text" placeholder="0" name="alugados" disabled>
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
        document.getElementById('nome-error').innerHTML = '';
        document.getElementById('email-error').innerHTML = '';
        document.getElementById('celular-error').innerHTML = '';
        document.getElementById('endereco-error').innerHTML = '';


        // Obtém os valores dos campos de entrada
        var nome = document.getElementById('nome').value;
        var email = document.getElementById('email').value;
        var cel = document.getElementById('cel').value;
        var ende = document.getElementById('endereco').value;
       

        // Verifica se os campos estão vazios
        if (nome === '') {
            document.getElementById('nome-error').innerHTML = 'Por favor, insira o nome.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('nome');
            el.style.borderColor = "#e74c3c";

        }
        if (email === '') {
            document.getElementById('email-error').innerHTML = 'Por favor, insira o email.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('email');
            el.style.borderColor = "#e74c3c";

        }
        if (cel === '') {
            document.getElementById('celular-error').innerHTML = 'Por favor, insira um numero de celular.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('cel');
            el.style.borderColor = "#e74c3c";
        }
        if (ende === '') {
            document.getElementById('endereco-error').innerHTML = 'Por favor, insira um endereço.';
            event.preventDefault(); // Impede o envio do formulário
            let el = document.getElementById('endereco');
            el.style.borderColor = "#e74c3c";
        }
        
    });
</script>
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>