<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/listagemPaciente.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="../../../src/output.css" />
  <title>Document</title>

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
      /* Estilos para a página toda */
body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.main {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

.content {
  flex: 1;
  padding: 20px;
}

.form-row {
  margin-bottom: 20px;
}

.full-width {
  width: 100%;
}

/* Estilos para a tabela */
.styled-table {
  width: 100%;
  border-collapse: collapse;
}

.styled-table th,
.styled-table td {
  padding: 12px 15px;
  border: 1px solid #ddd;
  text-align: left;
}

.styled-table th {
  background-color: #f2f2f2;
  font-weight: bold;
}

.styled-table tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

.styled-table tbody tr:hover {
  background-color: #ddd;
}

/* Bordas arredondadas */
.rounded {
  border-radius: 5px;
}

/* Estilos para a tabela */
table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
}

th, td {
  padding: 10px;
  border: 1px solid ;
  text-align: left;
}

/* th {
  background-color: #D9D9D9;
}
td{
  background-color: 	#808080;
} */

/* linhas pares (even) */
tr:nth-child(even) {
    background-color: #CCC;
}
/* linhas ímpares (odd) */
tr:nth-child(odd) {
    background-color: #FFF;
}
nav {
    /* Estilo existente do nav */
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    width: 65px;
    background-color: #333; /* Exemplo de cor */
    z-index: 1000; /* Para garantir que o nav fique sobre outros elementos */
  }
  
  nav.expandir {
    width: 300px;
  }
  nav.expandir + .content {
    margin-left: 300px;
  }
  .container {
  justify-content: center;
  max-width: 85%;
  height: 80%;
  margin-top: 100px;
  padding: 90px 200px 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  background-color: #D9D9D9;
}
.content {
    margin-left: 65px;
    transition: margin-left 0.2s;
  }
  nav.expandir + .content {
    margin-left: 300px;
  }
  main{
  display: flex;
  justify-content: center;
}
/* Estilos para o título */
.card-title {
  font-size: 44px;
  text-align: center;
  margin-top: -45px;
}
#search {
  display: inline-block; /* Mantém o campo de pesquisa em linha */
  margin-right: 10px; /* Adiciona um espaço entre o campo de pesquisa e o botão */
  margin-top: 5px;
  padding: 10px;
  border-radius: 70px;
}

#searchButton {
  
  display: inline-block; /* Mantém o botão de pesquisa em linha */
  padding: 10px 20px;
  background-color: #0c5f55;
  color: #fff;
  border: none;
  border-radius: 70px;
  margin-top: 5px;
  cursor: pointer;
}

.form-row > div {
  margin-bottom: 15px; 
}



    </style>
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
  <div class="container">
  <h1 class='card-title'>Lista de pacientes</h1> 
    <div class="form-row full-width">
      <div>
        <input type="text" id="search" onkeyup="fetchPacientes()" placeholder="Pesquisar...">
        <button type="submit" id="searchButton">Pesquisar</button>
      </div>
      <div id="results">

    <?php

    include_once ("../conexao.php");

    $sql = "SELECT *
    FROM paciente";

    $resultado = mysqli_query($conexao, $sql);
    

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
        echo "<td> <i class='fa-solid fa-trash'  style='color: #bdbdbd;'> </i>  </td>";
        echo "</tr>";
      }
      echo "</table>";
    } else {
      echo "Não há registros na tabela.";
    }

    // Fecha a conexão
    mysqli_close($conexao);
    ?>
          </div>
    </div>
  </div>
  </main>
  <script src="../../javascript/menu.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
      $("#search").on("input", function () {
        var searchTerm = $(this).val();
        if (searchTerm !== "") {
          $.ajax({
            url: "searchPaciente.php",
            method: "POST",
            data: { query: searchTerm },
            success: function (data) {
              $("#results").html(data);
            }
          });
        } else {
          $("#results").html("");
        }
      });
    });
  </script>
</body>
</html>