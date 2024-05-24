<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/listagemPaciente.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../../../src/output.css" />
  <title>Document</title>
</head> 

<body class="flex h-screen bg-white text-black dark:bg-fundo">
  <nav class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 shadow-custom-shadow duration-300 dark:bg-gray-800  dark:text-white" id="nav-lte">
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
        <a href="atendimento.html" class="flex items-center">
          <span class="icon">
            <i class="fa-regular fa-address-book text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Atendimento</span>
        </a>
      </li>
      <li class="item-menu w-full">
        <a href="../Paciente/home_paciente.html" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"></i>
          </span>
          <span class="txt-link overflow-hidden text-white">Paciente</span>
        </a>
      </li>
      <li class="item-menu w-full">
        <a href="#" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-cart-shopping text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Estoque</span>
        </a>
      </li>
      <li class="item-menu w-full">
        <a href="#" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-box-archive text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Cadastrar Produto</span>
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
        <a href="#" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-right-from-bracket text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Sair</span>
        </a>
      </li>
    </ul>
  </nav>
  <main class="content flex-1 conteudo">
  <?php

  include_once("../conexao.php");

  $sql = "SELECT *
                            FROM paciente";

  $resultado = mysqli_query($conexao, $sql);
  echo "<h2 class='card-title'>Lista de pacientes</h2>";


  if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {

      echo "<hr>";
      echo "<p><span class='negrito'> Nome Completo:</span> " . $row['nome_paciente'] . "</p>";
      echo "<p><span class='negrito'> CPF:</span> " . $row['cpf'] . "</p>";
      echo "<p><span class='negrito'> RG:</span> " . $row['RG'] . "</p>";
      echo "<p><span class='negrito'> Email:</span> " . $row['email'] . "</p>";
      echo "<p><span class='negrito'> Data de nascimento:</span> " . $row['nascimento'] . "</p>";
      echo "<p><span class='negrito'> Telefone:</span> " . $row['telefone'] . "</p>";
      echo "<p><span class='negrito'> Endereço:</span> " . $row['endereco'] . "</p>";
      echo "<p><span class='negrito'> Bairro:</span> " . $row['bairro'] . "</p>";
      echo "<p><span class='negrito'> Cidade:</span> " . $row['cidade'] . "</p>";
      echo "<p><span class='negrito'>Cep:</span> " . $row['cep'] . "</p>";
    }
  } else {
    echo "Não há registros na tabela.";
  }

  // Fecha a conexão
  mysqli_close($conexao);
  ?>
  </main>
  <script src="../../javascript/menu.js"></script>
</body>

</html>