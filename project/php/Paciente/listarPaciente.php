<?php
include('../login/protect.php');
?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../../../src/output.css" />
  <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
  <link rel="stylesheet" href="../../css/listagemPaciente.css" />
  <title>Listar Paciente</title>


  <style>
    main {
      display: flex;
      justify-content: center;
      background-color: #0c5f55;

      .titulo {
        text-align: center;
        color: #0c5f55;
        font-size: 45px;
        padding: 0px 20px 0px;
      }
    }
  </style>

</head>

<body class="flex h-screen bg-white text-black dark:bg-fundo">
  <nav class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 duration-300 dark:bg-gray-800  dark:text-white" id="nav-lte">
    <div class="mb-5 w-full cursor-pointer pl-2.5">
      <i class="fa-solid fa-list text-2xl text-white" id="btn-exp"></i>
    </div>

    <ul class="h-full list-none space-y-4">
      <li class="item-menu w-full">
        <a href="../../html/agenda/pagina.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-house text-2xl leading-5 text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Home</span>
        </a>
      </li>

      <li class="item-menu w-full">
        <a href="../../html/atendimento/home_atendimento.php" class="flex items-center">
          <span class="icon">
            <i class="fa-regular fa-address-book text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Atendimento</span>
        </a>
      </li>
      <li class="item-menu ativo w-full">
        <a href="../../html/paciente/home_paciente.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"></i>
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
        <a href="../../html/Estoque/cadastrar_estoque.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-box-archive text-2xl text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Cadastrar Produto</span>
        </a>
      </li>
      <li class="item-menu w-full">
        <a href="../vendas/relatorioVendas.php" class="flex items-center">
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
        <a href="../login/logout.php" class="flex items-center">
          <span class="icon">
            <i class="fa-solid fa-right-from-bracket text-white"></i>
          </span>
          <span class="txt-link ml-5 overflow-hidden text-white">Sair</span>
        </a>
      </li>
    </ul>
  </nav>
  <main class="content flex-1 conteudo">
    <div class="container">
      <h1 class='card-title'>Lista de pacientes</h1>

      <?php
      include_once("../conexao.php");

      // Verifica se há um termo de pesquisa
      if (isset($_GET['pesquisa']) && !empty($_GET['pesquisa'])) {
        $pesquisa_term = $_GET['pesquisa'];
        $sql = "SELECT * FROM paciente
              WHERE nome_paciente LIKE '%$pesquisa_term%' ";
      } else {
        $sql = "SELECT * FROM paciente";
      }

      $resultado = mysqli_query($conexao, $sql);

      if ($resultado) {
      ?>
        <form method='GET' action=''>
          <div class="form-row full-width">
            <div>
              <input type='text' id='search' name='pesquisa' placeholder='Pesquisar...' value='<?php echo isset($_GET["pesquisa"]) ? $_GET["pesquisa"] : ""; ?>'>
              <button type='submit' id='btnBusca'><i class='fa-solid fa-magnifying-glass'></i></button>
            </div>
          </div>
          <div id="results">
        </form>

      <?php

        if (mysqli_num_rows($resultado) > 0) {
          echo "<table border='1'>";
          echo "<tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>Data de nascimento</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Cep</th>
          </tr>";
          while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $row['nome_paciente'] . "</td>";
            echo "<td>" . $row['cpf'] . "</td>";
            echo "<td>" . $row['RG'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['nascimento'] . "</td>";
            echo "<td>" . $row['telefone'] . "</td>";
            echo "<td>" . $row['endereco'] . "</td>";
            echo "<td>" . $row['bairro'] . "</td>";
            echo "<td>" . $row['cidade'] . "</td>";
            echo "<td>" . $row['cep'] . "</td>";
            echo "<form action='atualizarPaciente.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['id_paciente'] . "'>";
            echo "<td> <button type='submit' class='fa-regular fa-pen-to-square' style='color: #38a9ff;'</button> </td>";
            echo "</form>";
            echo "<form action='excluirPaciente.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row['id_paciente'] . "'>";
            echo "<td> <button type='submit' class='fa-solid fa-trash'  style='color: #d33131';</button> </td>";
            echo "</form>";
            echo "</tr>";
          }
          echo "</table>";
        } else {
          echo "Não há registros na tabela.";
        }
      } else {
        mysqli_close($conexao);
      }
      // Fecha a conexão
      mysqli_close($conexao);
      ?>
    </div>
    </div>
    </div>
  </main>
  // ?>
  </div>
  </div>
  </main>
  <script src="../../javascript/menu.js"></script>
</body>

</html>