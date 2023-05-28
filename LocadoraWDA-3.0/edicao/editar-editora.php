
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css-manual/style-registro.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php 

    include_once '../funcoes/conexao.php';

    $id = $_GET['id'];

    $consultar = $conn->query("SELECT * FROM editora WHERE id='$id'");

    while($dados = $consultar->fetch_assoc()){
            $nome   = $dados['nome'];
            $email	= $dados['email'];
            $telefone 	= $dados['telefone'];
            $site 	= $dados['site'];
    }
    ?>
  <div class="container" style="margin-top:3%;">
    <div class="title">Editar editora <a href="../paginacao/editoras.php" style="position: relative;left: 65%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="./funcoes-up/up-editora.php?id=<?php echo $id;?>" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome" value="<?php echo $nome;?>" name="nome" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="E-mail" value="<?php echo $email;?>" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Telefone</span>
            <input type="text" id="cel" name="telefone" value="<?php echo $telefone;?>" placeholder="(XX) X-XXXX-XXXX" maxlength="15" autocomplete="off" onkeyup="mascara_cel()" required>
          </div>
          <div class="input-box">
            <span class="details">Site</span>
            <input type="text" placeholder="www.wdalocadora.com" value="<?php echo $site;?>" name="site">
          </div>
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Editar">
        </div>
      </form>
    </div>
  </div>
  <script src="../js-manual/mask-cadastro.js"></script>
</body>
</html>