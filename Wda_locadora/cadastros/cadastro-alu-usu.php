<?php 
include_once '../funcoes/conexao.php';
$data_atual = date('Y-m-d', strtotime('-3 hour'));
$id_usuario = $_GET['id'];
$sql = "SELECT nome FROM usuarios WHERE id='$id_usuario'";
$sql_query = $conn->query($sql);
$dados = $sql_query->fetch_assoc();

?>
<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../css-manual/style-registro.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container" style="margin-top:3%;">
    <div class="title">Novo Aluguel <a href="../paginacao/aluguel.php" style="position: relative;left: 64%; top: 0%;"><img src="../imagens/sair.png"></a></div>
    <div class="content">
      <form action="../inserir/add-alu-usu.php?id=<?php echo $id_usuario?>" method="POST">
        
        <div class="user-details">
            <div class="input-box">
            <span class="details">Nome</span>
            <input type="text" placeholder="Nome Completo" value="<?php echo $dados['nome']?>" name="nome" required>
            </div>
            <div class="input-box">
            <span class="details">Nome Livro</span>
            <select style="font-size: 16px; height: 45px; width: 100%;border-radius: 5px;padding-left: 15px;border: 1px solid #ccc;border-bottom-width: 2px;transition: all 0.3s ease;" class="form-select" name="livro" id="">
                <option disabled >Selecionar Livro</option>
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
          </div>
          <div class="input-box">
            <span class="details">Data de Aluguel</span>
            <input type="date" id="data" value="<?php echo $data_atual ?>" name="data_alu" disabled>
          </div>
          <div class="input-box">
            <span class="details">Data de Entrega</span>
            <input type="date" id="data" name="data_entreg">
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