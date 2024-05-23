<?php

    include_once('conexao.php');

    if(isset($_POST['email'])  || isset($_POST['senha'])){

        if(strlen($_POST['email']) == 0){
            echo "Preenche o seu e-mail";
        }elseif(strlen($_POST['senha']) == 0){
            echo "Preenche o seu senha";
        }else{
        
            $email = $conexao->real_escape_string($_POST['email']);
            $senha = $conexao->real_escape_string($_POST['senha']);
        
            $sql_code = "SELECT * FROM login WHERE email = '$email' LIMIT 1";
            $sql_query = $conexao->query($sql_code) or die("Falha na execução do codigo SQL" . $conexao->error);
        
            $usuario = $sql_query->fetch_assoc();
        
            if(password_verify($senha, $usuario['senha'])){

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id_login'] = $usuario['id_login'];
                $_SESSION['usuario'] = $usuario['usuario'];

                echo "Deu certo";
                header("Location: teste.php");
            }else{
                echo "Falha!! E-mail ou senha incorretos";

            }
        
        }
}

?>