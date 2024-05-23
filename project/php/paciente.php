<!DOCTYPE html>
<html lang="pt-br">
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
    $email = $_POST['email'];
    $nascimento = $_POST['nascimento'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];


    $insere_paciente = mysqli_query($conexao, "INSERT INTO paciente (nome_paciente, cpf, RG, email, nascimento, telefone, endereco, bairro, cep, cidade) 
    VALUES ('$nome','$cpf','$RG','$email', '$nascimento', '$telefone', '$endereco','$bairro','$cep', '$cidade')") or die(mysqli_error($conexao));

    if ($insere_paciente) { 
        echo "<div class='backg'>";
        echo "<h2 class='msg'> Os dados do paciente foram inseridos com sucesso  </h2>";
        echo "</div>";
    } else {
        echo "<div class='backg'>";
        echo "<h2> Ocorreu um erro ao inserir os dados. Por favor, tente novamente. </h2>";
        echo "</div>";
    }

?>
</body>
</html>