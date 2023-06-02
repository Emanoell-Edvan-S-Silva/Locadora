<?php
 include '../funcoes/conexao.php';
    
    



    @$data = $_POST['data_entreg'];

        @$id_livro = $_POST['livro'];

        @$livro_pesquisa = "SELECT * FROM livro WHERE id = '$id_livro'";
        @$sql_query = $conn->query($livro_pesquisa);
        @$dados_livro = $sql_query->fetch_assoc();
        $livro_qtd = $dados_livro['estoque'];

        if( @$livro_qtd > 0 ){

            $id_usu = $_POST['usuario'];
            $usuario_sql = "SELECT nome FROM usuarios WHERE id = '$id_usu'";
            $usuario_query = $conn->query($usuario_sql);
            $usu = $usuario_query->fetch_assoc();
            $nome_usu = $usu['nome'];


            // Pegar dados para finalizar aluguel
            $nome_li = $dados_livro['nome'];
            $autor_li = $dados_livro['autor'];
            $editora_li = $dados_livro['editora'];
            $data_alug = date('Y-m-d', strtotime('-3 hour'));

            $sql = "INSERT INTO aluguel (id_cliente, nome_cliente, id_livro, nome_livro, autor_livro, editora_livro, data_alu, data_devo, status) VALUES ('$id_usu','$nome_usu','$id_livro','$nome_li','$autor_li','$editora_li','$data_alug','$data', 'Atrasado')";
            
            // Mudndo o valor de estoque e add no alugados
            $update_query = "UPDATE livro SET estoque = estoque - 1, alugados_agr = alugados_agr + 1, alugados_total = alugados_total + 1 WHERE id = $id_livro";
            mysqli_query($conn, $update_query);
            
            $update_alugados = "UPDATE usuarios SET alugados = alugados + 1 WHERE id = $id_usu";
            mysqli_query($conn, $update_alugados);

            $update_ulti = "UPDATE controle_devo SET ulti_alug = '$nome_li'";
            mysqli_query($conn, $update_ulti);
            
            if ($conn->query($sql) == TRUE) {

                header('Location: ../paginacao/aluguel.php');
    
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
    
        }
        else{
            echo "<script>alert('tem 0 no estoque');
            javascript:window.location='../cadastros/cadastro-aluguel.php';</script>";
            exit;
        }
        
    

?>
