<?php
   include('../login/protect.php');
?>

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
    <title>Inserir Retorno Atendimento</title>
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
        .botao{
          background-color: #118E7F;
          color: #fff;
          width: 15%;
          padding: 3px 8px;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          font-size: 30px;
          margin: 0 auto;
          margin-top: 10%;
        }

        .container {
    max-width: 67%;
    height: 80%;
    margin: 100px 20px 100px auto; /* Margem à direita menor e margem à esquerda maior */
    padding: 90px 200px 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #D9D9D9;
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
}
.container {
    max-width: 75%;
    height: 80%;
    margin-top: 100px;
    margin-bottom: 100px;
    margin-left: auto; /* Centraliza horizontalmente */
    margin-right: 100px; /* Margem à direita */
    padding: 90px 200px 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #D9D9D9;
    display: flex;
    justify-content: center;
    align-items: center;
    box-sizing: border-box;
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
<main class="flex justify-center items-center h-full w-full" id="cd-paciente">
  <div class="container flex items-center flex-col">
    <?php
        include_once('../conexao.php');

        // Capturando dados do formulário
        $paciente = $_POST['nome'];  
        $produto = $_POST['produto'];
        $tipo = $_POST['tipo'];

        // Buscando o preço do produto
        $sql_preco = "SELECT id_produto,preco FROM produto WHERE id_produto = '$produto' LIMIT 1";
        $resultado_preco = mysqli_query($conexao, $sql_preco);

        if (mysqli_num_rows($resultado_preco) > 0) {
            while ($row = mysqli_fetch_assoc($resultado_preco)) {
                            
              $total_venda  = $row['preco'];

            }
        }

        date_default_timezone_set('America/Sao_Paulo');
        // Captura a data atual para data_inicio e data de venda
        $data_fim = date('Y-m-d');
        $data_venda = date('Y-m-d H:i:s');

        // Verificando se o id_paciente existe na tabela Paciente
        $sql = "SELECT id_paciente FROM Paciente WHERE nome_paciente = '$paciente'";
        $resultado = mysqli_query($conexao, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            $id_paciente = $row['id_paciente'];

            // Verificar se a tabela produtoestoque existe
            $sql = "SHOW TABLES LIKE 'ProdutoPaciente'";
            $table_exists = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($table_exists) > 0) {
                $sql = "SELECT data_inicio FROM ProdutoPaciente WHERE id_paciente = '$id_paciente'";
                $resultado = mysqli_query($conexao, $sql);

                if (mysqli_num_rows($resultado) > 0) {
                    $row = mysqli_fetch_assoc($resultado);
                    $data_inicio = $row['data_inicio'];
                }
            } else {
                exit;
            }

            // Inserção na tabela ProdutoPaciente
            $query_produto_paciente = "INSERT INTO ProdutoPaciente (id_produto, id_paciente, status, data_inicio, data_fim) VALUES ('$produto', '$id_paciente', '$tipo', '$data_inicio', '$data_fim')";
            $result_produto_paciente = mysqli_query($conexao, $query_produto_paciente);

            if ($result_produto_paciente && mysqli_affected_rows($conexao) > 0) {
                // Atualizando a quantidade em estoque
                if ($tipo == "compra") {
                    $query_venda = "INSERT INTO Venda (data, total_venda, id_produto, id_paciente) VALUES ('$data_venda', '$total_venda', '$produto', '$id_paciente')";
                    $result_venda = mysqli_query($conexao, $query_venda);
                    $id_venda = mysqli_insert_id($conexao);

                    if ($result_venda && mysqli_affected_rows($conexao) > 0) {
                        echo '    <div class="mb-32">';
                        echo '      <h1 class="text-5xl text-greenF">PRODUTO COMPRADO COM SUCESSO!</h1>';
                        echo '      <div class="mt-20 text-center">';
                        echo '       <a href="../../html/agenda/pagina.php"<button class="botao">Voltar ao Início</button></a>';    /* o css do botao está no css interno */
                        echo '      </div>';

                        // Aqui está a parte para exibir a nota fiscal
                        $query = "
                            SELECT 
                                v.id_venda,
                                v.data AS data_venda,
                                v.total_venda,
                                p.nome_produto,
                                p.descricao AS descricao_produto,
                                p.preco,
                                pa.nome_paciente,
                                pa.cpf,
                                pa.RG,
                                pa.email,
                                pa.nascimento,
                                pa.telefone,
                                pa.endereco,
                                pa.bairro,
                                pa.cidade,
                                pa.cep
                            FROM  
                                Venda v
                            JOIN 
                                Produto p ON v.id_produto = p.id_produto
                            JOIN 
                                Paciente pa ON v.id_paciente = pa.id_paciente
                            ORDER BY 
                                v.id_venda DESC
                            LIMIT 1;
                        ";

                        $result = mysqli_query($conexao, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo "<form action='TCPDF/gerarpdf.php' method='post'>";
                            foreach ($row as $key => $value) {
                                echo "<input type='hidden' name='$key' value='$value'>";
                            }
                            echo "<button type='submit' style='color: #FFFFFF;'> Gerar nota fiscal </button>";
                            echo "</form>";
                        } else {
                            echo "Erro ao recuperar informações da venda.";
                        }
                    } else {
                        echo "Erro ao inserir o registro na tabela Venda." . mysqli_error($conexao);
                    }
                } elseif ($tipo == "devolvido") {
                    $query_estoque = "UPDATE Produto SET quantidade = quantidade + 1 WHERE id_produto = '$produto'";
                    $result_estoque = mysqli_query($conexao, $query_estoque);

                    if ($result_estoque && mysqli_affected_rows($conexao) > 0) {
                        echo '    <div class="mb-32">';
                        echo '      <h1 class="text-5xl text-greenF">PRODUTO DEVOLVIDO COM SUCESSO!</h1>';
                        echo '      <div class="mt-20 text-center">';
                        echo '        <a href="../../html/agenda/pagina.php"<button class="botao">Voltar ao Início</button></a>';    /* o css do botao está no css interno */
                        echo '      </div>';
                        echo '    </div>';
                    } else {
                        echo "Erro ao devolver: " . mysqli_error($conexao);
                    }
                }
            } else {
                echo "Erro ao inserir o registro na tabela ProdutoPaciente: " . mysqli_error($conexao);
            }
        } else {
            echo "Paciente não encontrado.";
        }

        // Fechando a conexão
        mysqli_close($conexao);
    ?>
  </div>
</main>

<script src="../../javascript/menu.js"></script>
</body>
</html>
