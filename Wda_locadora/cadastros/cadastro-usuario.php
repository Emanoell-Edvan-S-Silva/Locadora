
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="../css-manual/style-registro.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container" style="margin-top:3%;">
    <div class="title">Cadastrar Usuario <a href="../paginacao/usuarios.php" style="position: relative;left: 55%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="../inserir/add-usuarios.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome Completo" name="nome" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="E-mail" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Celular</span>
            <input type="text" id="cel" name="celular" placeholder="(XX) X-XXXX-XXXX" maxlength="15" autocomplete="off" onkeyup="mascara_cel()" required>
          </div>
          <div class="input-box">
            <span class="details">Endereço</span>
            <input type="text" placeholder="Endereço" name="endereco" required>
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
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>