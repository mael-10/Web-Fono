<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    include_once("conexao.php");

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $RG = $_POST['rg'];
    $gmail = $_POST['email'];



    $insere_condutor = mysqli_query($conexao, "INSERT INTO condutor () 
    VALUES ('$nome','$foto_perfil_destino', '$data_nascimento', '$cidade', '$cpf', '$endereco', '$telefone', '$email', '$carteira_motorista', '$data_cart_motorista', '$data_cart_vencimento', '$categoria_cart_motorista', NULL)") or die(mysqli_error($conexao));

    if ($insere_condutor) {
        echo "<div class='backg'>";
        echo "<h2 class='msg'> Inserido com sucesso!!! </h2>";
        echo "</div>";
    } else {
        echo "<div class='backg'>";
        echo "<h2> Ocorreu um erro ao inserir os dados. Por favor, tente novamente. </h2>";
        echo "</div>";
    }

?>
</body>
</html>