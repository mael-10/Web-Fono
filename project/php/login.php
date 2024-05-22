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
    
        $sql_code = "SELECT * FROM login WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do codigo SQL" . $mysqli->error);
    
        $quantidade = $sql_query->num_rows;
    
        if($quantidade == 1){
            
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['usuario'] = $usuario['usuario'];

            header("Location: teste.php");

        }else{
            echo "Falha!! E-mail ou senha incorretos";
            header("Location: ../index.html");
        }
    
    }
}



?>