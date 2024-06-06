<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../../../src/output.css" />

  <link rel="stylesheet" href="../../css/listagemPaciente.css"/>
  <title>Listar Paciente</title>

  <script>
    function fetchPacientes() {
      const query = document.getElementById('search').value;

      fetch('caminho_para_o_seu_php.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'query=' + encodeURIComponent(query)
      })
        .then(response => response.text())
        .then(data => {
          document.getElementById('result').innerHTML = data;
        });
    }

        // Função para carregar todos os pacientes ao carregar a página
        window.onload = function() {
            fetchPacientes();
        };
    </script>
    <style>

        main{
  display: flex;
  justify-content: center;
  background-color: #0c5f55;
  .titulo{
  text-align: center;
  color: #0c5f55;
  font-size: 45px;
  padding: 0px 20px 0px;
}
}
    </style>

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

<?php

include_once ("../conexao.php");  

$id_paciente = $_POST['id'];

$sql = "SELECT *
        FROM Paciente
        WHERE id_paciente = '$id_paciente'";

$resultado = mysqli_query($conexao, $sql);
echo "<div class='paciente-detalhes'>";

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        
        echo "<table>";
        echo"<form action='pacienteAtualizado.php' method='post' class='form-atualizar'>";

        echo"<div class='edit-form'>";
        echo "<label> ID: </label>";
        echo "<input name='id_paciente' type='text' class='form-control form-atualizar' id='id_paciente'  autocomplete='off' value='" . htmlspecialchars($row['id_paciente']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Nome Paciente: </label>";
        echo "<input name='nome_paciente' type='text' class='form-control form-atualizar' id='nome_paciente'  autocomplete='off' value='" . htmlspecialchars($row['nome_paciente']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> CPF: </label>";
        echo "<input name='cpf' type='text' class='form-control form-atualizar' id='cpf'  autocomplete='off' value='" . htmlspecialchars($row['cpf']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> RG: </label>";
        echo "<input name='RG' type='text' class='form-control form-atualizar' id='RG'  autocomplete='off' value='" . htmlspecialchars($row['RG']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Email: </label>";
        echo "<input name='email' type='email' class='form-control form-atualizar' id='email'  autocomplete='off' value='" . htmlspecialchars($row['email']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Nascimento: </label>";
        echo "<input name='nascimento' type='date' class='form-control form-atualizar' id='nascimento'  autocomplete='off' value='" . htmlspecialchars($row['nascimento']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Telefone: </label>";
        echo "<input name='telefone' type='tel' class='form-control form-atualizar' id='telefone'  autocomplete='off' value='" . htmlspecialchars($row['telefone']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Endereco: </label>";
        echo "<input name='endereco' type='text' class='form-control form-atualizar' id='endereco'  autocomplete='off' value='" . htmlspecialchars($row['endereco']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Bairro: </label>";
        echo "<input name='bairro' type='text' class='form-control form-atualizar' id='bairro'  autocomplete='off' value='" . htmlspecialchars($row['bairro']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> Cidade: </label>";
        echo "<input name='cidade' type='text' class='form-control form-atualizar' id='cidade'  autocomplete='off' value='" . htmlspecialchars($row['cidade']) . "'>";
        echo"</div>";

        echo"<div class='edit-form'>";
        echo "<label> CEP: </label>";
        echo "<input name='cep' type='text' class='form-control form-atualizar' id='cep'  autocomplete='off' value='" . htmlspecialchars($row['cep']) . "'>";
        echo"</div>";

        echo "<input type='submit' value='Salvar alteração' class='botões'>";
        echo "</form>";

        echo "</div>"; // Fecha a div paciente-detalhes
    }
} else {
    echo "Não há registros na tabela.";
}

// Fecha a conexão
mysqli_close($conexao);
?>