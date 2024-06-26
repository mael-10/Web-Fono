<?php
include('../../php/login/protect.php');
?>

<!doctype html>
<html lang="pt-br">

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
  <link rel="stylesheet" href="../../css/paciente.css" />
  <title>Cadastro Paciente</title>
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

      <li class="item-menu ativo w-full">
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

      <li class="item-menu w-full">
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
      <h1 class="titulo">CADASTRAR PACIENTE</h1>
      <form method="post" action="../../php/Paciente/paciente.php" class="dark:text-black">
        <div class="form-group full-width">
          <label class="dark:text-black" for="nome">Nome Completo:</label>
          <input type="text" id="nome_paciente" name="nome_paciente" required>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label for="celular">Celular:</label>
            <input type="tel" id="telefone" name="telefone" maxlength="15" onkeyup="handlePhone(event)" required>
          </div>
          <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" maxlength="14" onkeyup="handleCPF(event)" required>
          </div>
          <div class="form-group">
            <label for="rg">RG:</label>
            <input type="text" id="RG" name="RG" maxlength="13" onkeyup="handleRG(event)" required>
          </div>
          <div class="form-group">
            <label for="nascimento">Data de nascimento:</label>
            <input type="date" id="nascimento" name="nascimento" required>
          </div>
          <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" required>
          </div>
          <div class="form-group">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" required>
          </div>
          <div class="form-group">
            <label for="cidade">Cidade:</label>
            <input type="text" id="cidade" name="cidade" required>
          </div>
          <div class="form-group">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" maxlength="9" onkeyup="handleCEP(event)" required>
          </div>
        </div>
        <button class="btn" type="submit">
          <h1>Enviar</h1>
        </button>
      </form>
    </div>
  </main>

  <script src="../../javascript/menu.js"></script>
  <!-- MASCARAS -->
  <script>
    const handlePhone = (event) => {
      let input = event.target;
      input.value = phoneMask(input.value);
    };

    const phoneMask = (value) => {
      if (!value) return "";
      value = value.replace(/\D/g, "");
      value = value.replace(/(\d{2})(\d)/, "($1) $2");
      value = value.replace(/(\d)(\d{4})$/, "$1-$2");
      return value;
    };

    const handleCPF = (event) => {
      let input = event.target;
      input.value = cpfMask(input.value);
    };

    const cpfMask = (value) => {
      if (!value) return "";
      value = value.replace(/\D/g, "");
      value = value.replace(/(\d{3})(\d)/, "$1.$2");
      value = value.replace(/(\d{3})(\d)/, "$1.$2");
      value = value.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
      return value;
    };

    const handleRG = (event) => {
      let input = event.target;
      input.value = rgMask(input.value);
    };

    const rgMask = (value) => {
      if (!value) return "";
      value = value.toUpperCase(); // Converte para maiúsculo
      value = value.replace(/[^a-zA-Z0-9]/g, ""); // Remove tudo que não for letra ou dígito
      value = value.replace(/([a-zA-Z]{2})(\d)/, "$1-$2"); // Adiciona um hífen após os primeiros dois caracteres
      value = value.replace(/(\d{2})(\d)/, "$1.$2"); // Adiciona um ponto após os próximos dois dígitos
      value = value.replace(/(\d{3})(\d)/, "$1.$2"); // Adiciona um ponto após os próximos três dígitos
      value = value.replace(/(\d{3})(\d)/, "$1"); // Os últimos três dígitos
      return value;
    };



    const handleCEP = (event) => {
      let input = event.target;
      input.value = cepMask(input.value);
    };

    const cepMask = (value) => {
      if (!value) return "";
      value = value.replace(/\D/g, "");
      value = value.replace(/(\d{5})(\d{1,2})$/, "$1-$2");
      return value;
    };
  </script>
</body>

</html>