<?php
   include('../login/protect.php');
?>

<!DOCTYPE html>
<html lang="en">

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
    <link
      href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
    <link rel="stylesheet" href="../../../src/output.css" />
    
    <title>Estoque</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f0f0;
      }

      .content {
        margin-left: 65px;
        transition: margin-left 0.2s;
      }

      nav.expandir + .content {
        margin-left: 300px;
      }

      .icon img {
        max-width: 32px;
        height: auto;
      }

      nav:not(.expandir) .icon img {
        width: 32px;
      }

      .hidden {
        display: none;
      }

      main {
        padding-bottom: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 20px;
      }

      .options {
        background-color: #ccc;
        color: rgb(19, 19, 19);
        border-radius: 8px;
        padding: 20px;
        transition: transform 0.5s ease, box-shadow 0.5s ease;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin: 10px;
        flex: 1 1 calc(33% - 40px); /* Ajuste a largura do item */
        box-sizing: border-box;
      }

      .options:hover {
        transform: translateY(-10px);
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.6);
        cursor: pointer;
      }

      .titulo-options {
        color: #118E7F;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        font-size: 24px;
        margin-top: 20px;
      }

      .content-image {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 200px;
        width: 100%;
      }

      .content-image img {
        max-width: 100%;
        max-height: 100%;
        height: auto;
        width: auto;
      }

      .form-row.full-width {
        display: flex;
        justify-content: center;
        padding: 20px;
      }

      .options {
    background-color: #ccc;
    color: rgb(19, 19, 19);
    border-radius: 8px;
    padding: 20px;
    transition: transform 0.5s ease, box-shadow 0.5s ease;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    text-align: center;
    margin: 10px; /* Margem adicionada */
    width: calc(33.333% - 20px); /* Largura fixa para cada opção */
    float: left; /* Colocar cada opção lado a lado */
    box-sizing: border-box;
    height: 400px !important;
    width: 300px;
}
    #bk{
      background-color:#0c5f55;
    }
    </style>
</head>

<body class="flex h-screen bg-white text-black dark:bg-fundo" id='bk'>
<nav
  class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 duration-300 dark:bg-gray-800 dark:text-white"
  id="nav-lte">
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

    <li class="item-menu w-full">
      <a href="../../html/atendimento/home_atendimento.html" class="flex items-center">
        <span class="icon">
          <i class="fa-regular fa-address-book text-2xl text-white"></i>
        </span>
        <span class="txt-link ml-5 overflow-hidden text-white">Atendimento</span>
      </a>
    </li>
    <li class="item-menu w-full">
      <a href="../../html/paciente/home_paciente.html" class="flex items-center">
        <span class="icon">
          <i class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"></i>
        </span>
        <span class="txt-link overflow-hidden text-white">Paciente</span>
      </a>
    </li>
    <li class="item-menu ativo w-full">
      <a href="../estoque/listar_estoque.php" class="flex items-center">
        <span class="icon">
          <i class="fa-solid fa-cart-shopping text-2xl text-white"></i>
        </span>
        <span class="txt-link ml-5 overflow-hidden text-white">Estoque</span>
      </a>
    </li>
    <li class="item-menu w-full">
      <a href="../../html/Estoque/cadastrar_estoque.html" class="flex items-center">
        <span class="icon">
          <i class="fa-solid fa-box-archive text-2xl text-white"></i>
        </span>
        <span class="txt-link ml-5 overflow-hidden text-white">Cadastrar Produto</span>
      </a>
    </li>
    <li class="item-menu w-full">
      <a
        href="#"
        class="flex cursor-pointer items-center"
        id="dark-mode-toggle"
      >
        <span class="icon">
          <i class="fa-solid fa-moon text-2xl text-white" id="icon-moon"></i>
          <i class="fa-solid fa-sun hidden text-2xl text-white" id="icon-sun"></i>
        </span>
        <span class="txt-link ml-5 overflow-hidden text-white" id="dark-mode-text">Escuro</span>
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

<main class="content">


        <!-- Conteúdo principal dos produtos -->
        <?php
        include_once('../conexao.php');
        $sql = "SELECT * FROM produto";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<div class='options'>";
                echo "    <div class='content-image img-classe'>";
                echo "        <img src='" . $row['foto_produto'] . "' alt=''>";
                echo "    </div>";
                echo "    <h1 class='titulo-options'>Nome: " . $row['nome_produto'] . "</h1>";
                echo "    <p>Preço: R$" . $row['preco'] . "</p>";
                echo "    <p>Quantidade: " . $row['quantidade'] . "</p>";

                echo "<form action='atualizar_estoque.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row['id_produto'] . "'>";
                echo "<button type='submit' class='fa-regular fa-pen-to-square' style='color: #38a9ff;'</button> </td>";
                echo "</form>";
                
                echo "<form action='excluir_estoque.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . $row['id_produto'] . "'>";
                echo "<button type='submit' class='fa-solid fa-trash'  style='color: #d33131';</button> </td>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<p>Nenhum produto encontrado.</p>";
        }
        ?>

</main>

<script src="../../javascript/menu.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>
