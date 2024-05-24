<?php
include_once('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Preencha o seu e-mail";
    } elseif (strlen($_POST['senha']) == 0) {
        echo "Preencha a sua senha";
    } else {
        $email = $conexao->real_escape_string($_POST['email']);
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM login WHERE email = '$email' LIMIT 1";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            // Verificar a senha usando password_verify()
            if (password_verify($senha, $usuario['senha'])) {
                // Iniciar a sessão antes de redirecionar
                session_start();

                // Armazenar dados do usuário na sessão
                $_SESSION['id_login'] = $usuario['id_login'];
                $_SESSION['usuario'] = $usuario['usuario'];

                // Redirecionar para a página de teste
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
