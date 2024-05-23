<?php
include_once('conexao.php');
session_start();

if(isset($_POST['email']) && isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
        echo "Preencha o seu e-mail";
    } elseif(strlen($_POST['senha']) == 0) {
        echo "Preencha a sua senha";
    } else {
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $conexao->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM login WHERE email = '$email' LIMIT 1";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        if($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            // Depuração: Verifique se a senha recuperada do banco de dados está correta
            echo "Senha no banco de dados: " . $usuario['senha'] . "<br>";

            if(password_verify($senha, $usuario['senha'])) {

                $_SESSION['id_login'] = $usuario['id_login'];
                $_SESSION['usuario'] = $usuario['usuario'];

                header("Location: teste.php");
                
                exit;
            } else {
                echo "Falha!! E-mail ou senha incorretos";
            }
        } else {
            echo "Falha!! E-mail ou senha incorretos";
        }
    }
}
?>