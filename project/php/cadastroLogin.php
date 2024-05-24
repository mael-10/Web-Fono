<?php
include_once('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['usuario'])) {
    $usuario = $conexao->real_escape_string($_POST['usuario']);
    $email = $conexao->real_escape_string($_POST['email']);
    $senha = $_POST['senha'];


    $sql_code = "INSERT INTO login (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";
    $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

    if ($sql_query) {
        echo "Usuário registrado com sucesso!";
    } else {
        echo "Erro ao registrar usuário.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h3>Cadastrar Senha</h3>
    <form action="" method="post">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" required>
        <label for="email">Email</label>
        <input type="email" name="email" required>
        <label for="senha">Senha</label>
        <input type="password" name="senha" required>
        <input type="submit" value="Cadastrar Senha">
    </form>
</body>
</html>
