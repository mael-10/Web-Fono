<?php
include('../../php/login/protect.php');
?>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="css/paciente.css">
  <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
  <link rel="stylesheet" href="../../../src/output.css" />
  <link rel="stylesheet" href="../../css/cadastrar_estoque.css" />
  <title>Cadastrar Estoque</title>
  <style>
    .content {
      margin-left: 65px;
      transition: margin-left 0.2s;
    }

    nav.expandir+.content {
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
  </style>
</head>
</head>

<body class="flex h-screen bg-white text-black dark:bg-fundo">
  <nav class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 duration-300 dark:bg-gray-800  dark:text-white" id="nav-lte">
    <div class="mb-5 w-full cursor-pointer pl-2.5">
      <i class="fa-solid fa-list text-2xl text-white" id="btn-exp"></i>
    </div>

    <ul class="h-full list-none space-y-4">
      <li class="item-menu w-full">
        <a href="../agenda/pagina.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-house text-2xl leading-5 text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Home</span>
        </a>
      </li>
      <li class="item-menu  w-full">
        <a href="../atendimento/home_atendimento.php" class="flex items-center">
          <span class="icon">
            <i class="fa-regular fa-address-book text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Atendimento</span>
        </a>
      </li>

      <li class="item-menu w-full">
        <a href="../Paciente/home_paciente.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"></i>
          </span>
          <span class="txt-link overflow-hidden text-white">Paciente</span>
        </a>
      </li>

      <li class="item-menu w-full">
        <a href="../../php/estoque/listar_estoque.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-cart-shopping text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Estoque</span>
        </a>
      </li>

      <li class="item-menu ativo w-full">
        <a href="../estoque/cadastrar_estoque.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-box-archive text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Cadastrar Produto</span>
        </a>
      </li>

      <li class="item-menu w-full">
        <a href="../../php/vendas/relatorioVendas.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-dollar-sign  text-2xl text-white"></i>
          </span>
          <span class="txt-link overflow-hidden text-white">Vendas</span>
        </a>
      </li>

      <li class="item-menu w-full">
        <a href="#" class="flex cursor-pointer items-center" id="dark-mode-toggle">
          <span class="icon">
            <i class="fa-solid fa-moon text-2xl text-white" id="icon-moon"></i>
            <i class="fa-solid fa-sun hidden text-2xl text-white" id="icon-sun"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white" id="dark-mode-text">Escuro</span>
        </a>
      </li>
      <li class="item-menu w-full">
        <a href="../../php/login/logout.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-right-from-bracket text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Sair</span>
        </a>
      </li>
    </ul>
  </nav>
  <main class="content flex-1" id="cd-paciente">
    <div class="container">
      <h1 class="titulo">CADASTRAR PRODUTO</h1>
      <form method="post" action="../../php/Estoque/inserir_estoque.php" class="dark:text-black" enctype="multipart/form-data">
        <div class="form-group full-width">
          <label class="dark:text-black" for="nome">Nome Do produto:</label>
          <input type="text" id="nome" name="nome" required>
        </div>
        <div class="form-group full-width">
          <label for="celular">Descrição: </label>
          <input type="text" id="celular" name="descricao" required>
        </div>
        <div class="form-row">

          <div class="form-group">
            <label for="celular">Quantidade Produto:</label>
            <input type="number" id="celular" name="quantidade" required>
          </div>
          <div class="form-group">
            <label for="celular">Preço Produto:</label>
            <input type="number" id="celular" name="preco" required>
          </div>
          <label class="picture" for="picture__input" tabIndex="0">
            <span class="picture__image"></span>
          </label>

          <input type="file" name="foto_produto" id="picture__input">
        </div>
        <button class="btn" type="submit">
          <h1>Enviar</h1>
        </button>
      </form>
  </main>
  <!-- preview da imagem -->
  <script src="../../javascript/menu.js"></script>
  <script>
    const inputFile = document.querySelector("#picture__input");
    const pictureImage = document.querySelector(".picture__image");
    const pictureImageTxt = "Imagem do produto";
    pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener("change", function(e) {
      const inputTarget = e.target;
      const file = inputTarget.files[0];

      if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function(e) {
          const readerTarget = e.target;

          const img = document.createElement("img");
          img.src = readerTarget.result;
          img.classList.add("picture__img");

          pictureImage.innerHTML = "";
          pictureImage.appendChild(img);
        });

        reader.readAsDataURL(file);
      } else {
        pictureImage.innerHTML = pictureImageTxt;
      }
    });
  </script>
</body>

</html>