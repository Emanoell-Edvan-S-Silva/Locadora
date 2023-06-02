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

        $consultar = $conn->query("SELECT * FROM usuarios WHERE id='$id'");

        while($dados = $consultar->fetch_assoc()){
            $nome   = $dados['nome'];
            $email	= $dados['email'];
            $celular 	= $dados['celular'];
            $endereco 	= $dados['endereco'];
            $cpf 	= $dados['cpf'];
            $alugados 	= $dados['alugados'];
        }
        ?>
  <div class="container" style="margin-top:3%;">
  
    <div class="title">Editar Usuario <a href="../paginacao/usuarios.php" style="position: relative;left: 65%; top: 0%;"><img src="../imagens/sair.png"></a></div> 
    <div class="content">
      <form action="./funcoes-up/up-usuario.php?id=<?php echo $id;?>" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome Completo" name="nome" value="<?php echo $nome;?>" required>
          </div>

          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="E-mail" name="email" value="<?php echo $email;?>" required>
          </div>
          <div class="input-box">
            <span class="details">Celular</span>
            <input type="text" id="cel" name="celular" value="<?php echo $celular;?>" placeholder="(XX) X-XXXX-XXXX" maxlength="15" autocomplete="off" onkeyup="mascara_cel()" required>
          </div>
          <div class="input-box">
            <span class="details">Endereço</span>
            <input type="text" placeholder="Endereço" value="<?php echo $endereco;?>" name="endereco" required>
          </div>
          <div class="input-box">
            <span  class="details">CPF</span>
            <input type="text" value="<?php echo $cpf;?>" placeholder="CPF" name="cpf" id="cpf" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
          </div>
          <div class="input-box">
            <span class="details">Alugados</span>
            <input type="text" placeholder="Endereço" value="<?php echo $alugados;?>" name="alugados" disabled>
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