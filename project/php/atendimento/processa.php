<?php

    // Conexão com o banco de dados (já fornecido no seu código)
    // ...
    include_once("../conexao.php");

    $nome = $_POST['nome'];
    $produto = $_POST['produto'];
    $tipo = $_POST['tipo'];

    $sql = "SELECT id_paciente FROM paciente WHERE nome_paciente = '$nome'";
    $resultado = mysqli_query($conexao, $sql);


    
    $insere_atendimento_aparelho = mysqli_query($conexao, "INSERT INTO atendimento (data, hora, descricao, id_paciente) VALUES('$nome', '$produto', '$tipo')")


?>