<?php

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['id_login'])){
        die("Você não pode acessar esta pagina <p><a href='../../html/index.html'>Entrar</a> </p>");
    }

?>
