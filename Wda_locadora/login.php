<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./imagens/book.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css-manual/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login WDA</title>
</head>
<body class="bg">
<div class="login-box">
  <h2>Login</h2>
  <form action="./funcoes/entrar.php" method="POST" >
    <div class="user-box">
      <input type="text" name="email" required="">
      <label>E-mail</label>
    </div>
    <div class="user-box">
      <input type="password" name="senha" required="">
      <label>Senha</label>
    </div>
    <input class="bt" type="submit" value="Entrar">
    
    
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>