<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
            integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="css/paciente.css">
    <link
            href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
            rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
    <link rel="stylesheet" href="../../../src/output.css" />
    <link rel="stylesheet" href="../../css/atendimento.css">
    <title>Atendimento</title>
    <style>
        .content {
            margin-left: 65px;
            transition: margin-left 0.2s;
        }

        nav.expandir + .content {
            margin-left: 300px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }



    </style>
</head>
<body
        class="flex h-screen bg-white text-black dark:bg-fundo"

>
<nav
class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 shadow-custom-shadow duration-300 dark:bg-gray-800  dark:text-white"
id="nav-lte"
>
<div class="mb-5 w-full cursor-pointer pl-2.5">
  <i class="fa-solid fa-list text-2xl text-white" id="btn-exp"></i>
</div>

<ul class="h-full list-none space-y-4">
  <li class="item-menu w-full">
    <a href="menu.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-house text-2xl leading-5 text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white">Home</span>
    </a>
  </li>
  <li class="item-menu ativo w-full">
    <a href="../atendimento/atendimento.html" class="flex items-center">
      <span class="icon">
        <i class="fa-regular fa-address-book text-2xl text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Atendimento</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../Paciente/home_paciente.html" class="flex items-center">
      <span class="icon">
        <i
          class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"
        ></i>
      </span>
      <span class="txt-link overflow-hidden text-white">Paciente</span>
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../estoque/estoque.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-cart-shopping text-2xl text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Estoque</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../estoque/cadastrar_estoque.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-box-archive text-2xl text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Cadastrar Produto</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../../html/agenda/agenda.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-calendar-days"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Agenda</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a
      href="#"
      class="flex cursor-pointer items-center"
      id="dark-mode-toggle"
    >
      <span class="icon">
        <i
          class="fa-solid fa-moon text-2xl text-white"
          id="icon-moon"
        ></i>
        <i
          class="fa-solid fa-sun hidden text-2xl text-white"
          id="icon-sun"
        ></i>
      </span>
      <span
        class="txt-link ml-5 overflow-hidden text-white"
        id="dark-mode-text"
        >Escuro</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="#" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-right-from-bracket text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white">Sair</span>
    </a>
  </li>
</ul>
</nav>
<main class="content flex-1">
    <div class="container">
        <?php
            
            include_once('../conexao.php');

            $nome = $_POST['nome'];
            $dataAtendimento = $_POST['data'];
            $hora = $_POST['hora'];
            $descricao = $_POST['descricao'];

            $sql = "SELECT id_paciente FROM paciente WHERE nome_paciente = '$nome'";
            $resultado = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                    
                    $id_paciente = $row['id_paciente'];

                }
            }

            $insere_atendimento = mysqli_query($conexao, "INSERT INTO atendimento (data, hora, descricao, id_paciente) VALUES('$dataAtendimento', '$hora', '$descricao', '$id_paciente')")


        ?>
    </div>
</main>
<script src="../../javascript/menu.js"></script>
</body>
</html>