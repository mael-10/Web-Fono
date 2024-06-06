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
    <link rel="stylesheet" href="css/sucesso.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
    <link rel="stylesheet" href="../../../src/output.css" />
    <link rel="stylesheet" href="../../css/cadastrar_estoque.css"/>
    <title>Cadastrar Estoque</title>
    <style>
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
      </style>
  </head>
</head>
<body class="flex h-screen bg-white text-black dark:bg-fundo">
<nav
  class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 duration-300 dark:bg-gray-800  dark:text-white"
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
        <span class="txt-link ml-5 overflow-hidden text-white">Atendimento</span
        >
      </a>
    </li>
    <li class="item-menu ativo w-full">
      <a href="../../html/paciente/home_paciente.html" class="flex items-center">
        <span class="icon">
          <i
            class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"
          ></i>
        </span>
        <span class="txt-link overflow-hidden text-white">Paciente</span>
      </a>
    </li>
    <li class="item-menu w-full">
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
      <a href="../login/logout.php" class="flex items-center">
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
            <?php

              include_once('../conexao.php');

              $produto = $_POST['nome'];
              $descricao = $_POST['descricao'];
              $quantidade = $_POST['quantidade'];
              $preco = $_POST['preco'];

              //imagem do produto
              $foto_produto = $_FILES['foto_produto']['tmp_name'];
              $foto_produto_destino = '../imagensDinamicas/' . $_FILES['foto_produto']['name'];

              move_uploaded_file($foto_produto, $foto_produto_destino);

              $insere_produto = mysqli_query($conexao, "INSERT INTO produto (nome_produto, descricao, quantidade, preco,  foto_produto) VALUES ('$produto', '$descricao', $quantidade, $preco,  '$foto_produto_destino')");


              if($insere_produto){
              
                echo "";
                echo "";  
                echo "<h1 class=''>PRODUTO CADASTRADO COM SUCESSO!</h1>";
                echo "<a href='../../html/estoque/cadastrar_estoque.html'><button class='bt'>voltar ao ínicio </button></a>";
                echo "";
                echo "";
              }else{
                echo "<div class='sucesso'>";
                echo "<p>Não foi possivel cadastrar este produto no banco! </p>";
                echo "</div>";
                echo "<a href=''></a><button class='text-white bg-buttonGree hover:bg-buttonHover'>Voltar ao Início</button>";
                
              }
            ?>
        </div>    
    </main>
    <script src="../../javascript/menu.js"></script>
</body>
</html>