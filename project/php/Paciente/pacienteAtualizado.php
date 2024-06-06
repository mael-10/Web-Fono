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
  <title>Paciente Atualizado</title>

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
</head>

<body class="flex h-screen bg-white text-black dark:bg-fundo">
  <nav
    class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 shadow-custom-shadow duration-300 dark:bg-gray-800  dark:text-white"
    id="nav-lte">
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
      <a href="../login/logout.php" class="flex items-center">
        <span class="icon">
          <i class="fa-solid fa-right-from-bracket text-white"></i>
        </span>
        <span class="txt-link ml-5 overflow-hidden text-white">Sair</span>
      </a>
    </li>
    </ul>
  </nav>

<main class="flex justify-center items-center h-full w-full" id="cd-paciente">
<div class="container flex items-center flex-col">

<?php

include_once("../conexao.php");

$id_paciente = mysqli_real_escape_string($conexao, $_POST['id_paciente']);
$nome_paciente = mysqli_real_escape_string($conexao, $_POST['nome_paciente']);
$cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
$RG = mysqli_real_escape_string($conexao, $_POST['RG']);
$email = mysqli_real_escape_string($conexao, $_POST['email']);
$nascimento = mysqli_real_escape_string($conexao, $_POST['nascimento']);
$telefone = mysqli_real_escape_string($conexao, $_POST['telefone']);
$endereco = mysqli_real_escape_string($conexao, $_POST['endereco']);
$bairro = mysqli_real_escape_string($conexao, $_POST['bairro']);
$cidade = mysqli_real_escape_string($conexao, $_POST['cidade']);
$cep = mysqli_real_escape_string($conexao, $_POST['cep']);

// Verifica se os valores não estão vazios
if (!empty($nome_paciente) && !empty($cpf) && !empty($RG) && !empty($email) && !empty($nascimento) && !empty($telefone) && !empty($endereco) && !empty($bairro) && !empty($cidade) && !empty($cep)) {
    $consulta = mysqli_query($conexao, "UPDATE paciente SET 
        nome_paciente = '$nome_paciente',
        cpf = '$cpf',
        RG = '$RG',
        email = '$email',
        nascimento = '$nascimento',
        telefone = '$telefone',
        endereco = '$endereco',
        bairro = '$bairro',
        cidade = '$cidade',
        cep = '$cep'
    WHERE id_paciente = '$id_paciente'");
                
    if ($consulta) {
        echo "<div class='retornos'> ";
        echo "<p></p>";
        echo "</div>";
    } else {
        echo "Erro ao atualizar os dados: " . mysqli_error($conexao);
    }
} else {
    echo "Todos os campos são obrigatórios.";
}

if ($consulta) {
  echo '    <div class="mb-32">';
        echo '      <h1 class="text-5xl text-greenF">ATUALIZADO COM SUCESSO!</h1>';
        echo '      <div class="mt-20 text-center">';
        echo '        <button class="text-white bg-buttonGreen hover:bg-buttonHover">Voltar ao Início</button>';
        echo '      </div>';
        echo '    </div>';
} else {
  echo "<div class='retornos'>";
  echo "<h2> Ocorreu um erro ao atualizar os dados. Por favor, tente novamente. </h2>";
  echo "</div>";
}


mysqli_close($conexao);
?>
    </div>
</main>
<script src="../../javascript/menu.js"></script>
</body>
</html>