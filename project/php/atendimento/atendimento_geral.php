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
    <link rel="stylesheet" href="../../css/atendimento_geral.css">
    <title>Atendimento Geral</title>
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
        .resultados a {
    display: block;
    padding: 5px;
    border: 1px solid #ccc;
    background: #fff;
    text-decoration: none;
    color: #333;
    border-radius: 25px;
}

.resultados a:hover {
    background: #f0f0f0;
}




    </style>
</head>
<body
        class="flex h-screen bg-white text-black dark:bg-fundo"

>
<nav
  class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 duration-300 dark:bg-gray-800  dark:text-white"
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
    <h1 class="titulo">ATENDIMENTO GERAL</h1>
        <form method="post" action="inserir_atendimento_geral.php" class="dark:text-black">
            <div class="form-group full-width">
                <label class="dark:text-black" for="nome">Nome Paciente:</label>
                <input type="text" id="nome" name="nome" placeholder="Pesquisar cliente"  required>
                <div id="resultados" class="resultados"></div>
            </div>
            <div class="form-group full-width">
            <label class="dark:text-black" for="produto">Selecione o produto:</label>
              <select name="produto" id="produto">
                
              <?php
                // Conexão com o banco de dados
                include_once("../conexao.php");

                // Consulta SQL para buscar os produtos
                $sql = "SELECT id_produto, nome_produto FROM Produto";
                $result = $conexao->query($sql);

                // Verifica se a consulta retornou resultados
                if ($result->num_rows > 0) {
                    // Loop através dos resultados e cria as opções do select
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["id_produto"] . '">' . $row["nome_produto"] . '</option>';
                    }
                }
              ?>
              </select>
                </div>
            <div class="form-group full-width">
                <label for="tipo">Selecione o tipo:</label>
                <select id="tipo" name="tipo">
                <option value="teste">Periodo de teste</option>
                <option value="compra">Compra</option>
                </select>
            </div>
            <div class="form-row">
            </div>
            <button class="btn" type="submit"><h1>Enviar</h1></button>
        </form>
    </div>
</main>
<script src="../../javascript/menu.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var nomeInput = document.getElementById("nome");
    var resultadosDiv = document.getElementById("resultados");

    nomeInput.addEventListener("input", function() {
        var searchQuery = nomeInput.value.trim();

        if (searchQuery !== "") {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "processa.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    resultadosDiv.innerHTML = "";

                    try {
                        var clientes = JSON.parse(xhr.responseText);

                        clientes.forEach(function(cliente) {
                            var clienteLink = document.createElement("a");
                            clienteLink.href = "#";
                            clienteLink.textContent = cliente.nome_paciente;
                            clienteLink.addEventListener("click", function(event) {
                                event.preventDefault();
                                nomeInput.value = cliente.nome_paciente;
                                resultadosDiv.innerHTML = "";
                            });
                            resultadosDiv.appendChild(clienteLink);
                        });
                    } catch (e) {
                        console.error("Erro ao processar resposta JSON:", e);
                    }
                }
            };
            xhr.send("search_query=" + encodeURIComponent(searchQuery));
        } else {
            resultadosDiv.innerHTML = "";
        }
    });
});
</script>
</body>
</html>
