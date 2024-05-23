<?php
    include_once('conexao.php');

    if(isset($_POST['email'])){

        $usuario = $conexao->real_escape_string($_POST['usuario']);
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string(password_hash($_POST['senha'], PASSWORD_DEFAULT));

        $conexao->query("INSERT INTO login (usuario, email, senha) VALUES('$usuario', '$email', '$senha')");
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
        <label for="">Usuario</label>
        <input type="text" name="usuario">
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Senha</label>
        <input type="password" name="senha">
        <input type="submit" value="Cadastrar Senha">
    </form>
</body>
</html>