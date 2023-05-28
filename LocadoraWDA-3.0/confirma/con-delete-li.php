<?php
$id=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirmação</title>
</head>
<body>


    <H3 style="margin-top:18%;" class="text-center">Confirmação para deletar esse Livro</H3>
    <p class="text-center">Confirme se você realmete quer excluir esse livro!</p>

    <a class="btn btn-secondary" style=" margin-left:42%;" href="../paginacao/livros.php">Voltar</a>
    <a class="btn btn-success" style="margin-left:4%;" href="../excluir/deletar-livro.php?id=<?php echo $id; ?>">Confirmar</a>

    


   


    

</body>
</html>