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
    <link rel="stylesheet" href="../../css/atendimento.css">
    <title>Atendimento</title>
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
        button{
          width: 40%;
        }
      </style>
</head>
<body
        class="flex h-screen bg-white text-black dark:bg-fundo"

>
<nav
class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 shadow-custom-shadow duration-300 dark:bg-gray-800  dark:text-white"
id="nav-lte"
>
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
    <a href="../atendimento/atendimento.html" class="flex items-center">
      <span class="icon">
        <i class="fa-regular fa-address-book text-2xl text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Atendimento</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../Paciente/home_paciente.html" class="flex items-center">
      <span class="icon">
        <i
          class="fa-solid fa-person ml-1 mr-1 text-2xl leading-5 text-white"
        ></i>
      </span>
      <span class="txt-link overflow-hidden text-white">Paciente</span>
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../estoque/estoque.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-cart-shopping text-2xl text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Estoque</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../estoque/cadastrar_estoque.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-box-archive text-2xl text-white"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Cadastrar Produto</span
      >
    </a>
  </li>
  <li class="item-menu w-full">
    <a href="../../html/agenda/agenda.html" class="flex items-center">
      <span class="icon">
        <i class="fa-solid fa-calendar-days"></i>
      </span>
      <span class="txt-link ml-5 overflow-hidden text-white"
        >Agenda</span
      >
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
<main class="flex justify-center items-center h-full w-full" id="cd-paciente">
<div class="container flex items-center flex-col">
    <?php
include_once('../conexao.php');

// Capturando dados do formulário
$paciente = $_POST['nome'];
$produto = $_POST['produto'];
$tipo = $_POST['tipo'];
$total_venda = isset($_POST['total_venda']) ? $_POST['total_venda'] : 0; // Caso não exista, define como 0


$sql = "SELECT id_paciente FROM paciente WHERE nome_paciente = '$paciente'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
                    
        $id_paciente = $row['id_paciente'];

    }
}

// Captura a data atual para data_inicio e data de venda
$data_inicio = date('Y-m-d');
$data_retorno = date('Y-m-d', strtotime($data_inicio . ' +2 days'));
$data_venda = date('Y-m-d H:i:s');

// Verificando se o id_paciente existe na tabela Paciente (opcional, dependendo de como você está lidando com isso)

  $query_produto_paciente = "INSERT INTO ProdutoPaciente (id_produto, id_paciente, status, data_inicio) VALUES ('$produto', '$id_paciente', '$tipo', '$data_inicio', '$data_inicio')";
  
  // Executando a query
  $result_produto_paciente = mysqli_query($conexao, $query_produto_paciente);


if ($result_produto_paciente) {
    if (mysqli_affected_rows($conexao) > 0) {

        // Atualizando a quantidade em estoque
        $query_estoque = "UPDATE produto SET quantidade = quantidade - 1 WHERE id_produto = '$produto'";
        $result_estoque = mysqli_query($conexao, $query_estoque);

        if ($result_estoque) {
            if (mysqli_affected_rows($conexao) > 0) {

                // Se o tipo for "compra", insira também na tabela Venda
                if ($tipo == "compra") {
                    // Construindo a query de inserção para a tabela Venda
                    $query_venda = "INSERT INTO Venda (data, total_venda, id_produto, id_paciente) VALUES ('$data_venda', '$total_venda', '$produto', '$id_paciente')";

                    // Executando a query
                    $result_venda = mysqli_query($conexao, $query_venda);

                    if ($result_venda) {
                        if (mysqli_affected_rows($conexao) > 0) {
                          echo '    <div class="mb-32">';
                          echo '      <h1 class="text-5xl text-greenF">REGISTRO INSERIDO COM SUCESSO!</h1>';
                          echo '      <div class="mt-20 text-center">';
                          echo '        <button class="text-white bg-buttonGreen hover:bg-buttonHover">Voltar ao Início</button>';
                          echo '      </div>';
                          echo '    </div>';                        } else {
                            echo "Erro ao inserir o registro na tabela Venda: " . mysqli_error($conexao);
                        }
                    } else {
                        echo "Erro ao executar a query para a tabela Venda: " . mysqli_error($conexao);
                    }
                }
                if($tipo == "teste"){

                  $hora = rand(0, 23); // Gera um número aleatório para as horas (de 0 a 23)
                  $minuto = rand(0, 59); // Gera um número aleatório para os minutos (de 0 a 59)
                  $horario_aleatorio = sprintf("%02d:%02d", $hora, $minuto);

                  $query_teste = "INSERT INTO atendimento (data, hora, descricao, id_paciente) VALUES('$data_retorno', '$horario_aleatorio', 'Retorno', '$id_paciente')";

                  $result_test = mysqli_query($conexao, $query_teste);
                  if ($result_test) {
                    if (mysqli_affected_rows($conexao) > 0) {
                      echo '    <div class="mb-32">';
                      echo '      <h1 class="text-5xl text-greenF">INSERIDO COM SUCESSO!</h1>';
                      echo '      <div class="mt-20 text-center">';
                      echo '        <button class="text-white bg-buttonGreen hover:bg-buttonHover">Voltar ao Início</button>';
                      echo '      </div>';
                      echo '    </div>';
                    } else {
                        echo "Erro ao inserir o registro na tabela Atendimento: " . mysqli_error($conexao);
                    }
                } else {
                    echo "Erro ao executar a query para a tabela Atendimento: " . mysqli_error($conexao);
                }
                }   
            } else {
                echo "Erro ao atualizar o estoque: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro ao executar a query para a tabela Estoque: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro ao inserir o registro na tabela ProdutoPaciente: " . mysqli_error($conexao);
    }
} else {
    echo "Erro ao executar a query para a tabela ProdutoPaciente: " . mysqli_error($conexao);
}

// Fechando a conexão
mysqli_close($conexao);
?>



    </div>
</main>
<script src="../../javascript/menu.js"></script>
</body>
</html>
