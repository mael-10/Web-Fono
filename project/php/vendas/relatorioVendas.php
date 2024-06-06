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
    <link rel="stylesheet" href="css/paciente.css">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../../src/output.css" />
    <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
    <link rel="stylesheet" href="../../css/relatorio_vendas.css" />
    <title>Home Paciente</title>

    </style>
</head>

<body class="flex h-screen bg-white text-black dark:bg-fundo">
    <nav class="fixed left-0 top-0 h-full w-[65px] bg-fundo p-4 duration-300 dark:bg-gray-800  dark:text-white"
        id="nav-lte">
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
                <a href="../atendimento/home_atendimento.html" class="flex items-center">
                    <span class="icon">
                        <i class="fa-regular fa-address-book text-2xl text-white"></i>
                    </span>
                    <span class="txt-link ml-5 overflow-hidden text-white">Atendimento</span>
                </a>
            </li>

            <li class="item-menu ativo w-full">
                <a href="../Paciente/home_paciente.html" class="flex items-center">
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
                <a href="../estoque/cadastrar_estoque.html" class="flex items-center">
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
                <a href="../../php/login/logout.php" class="flex items-center">
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
            <h1 class='card-title'>Relatório de Produtos Comprados</h1><br>

            <!-- Adicione o campo de entrada de data de início -->
            <form method="GET">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" id="data_inicio" name="data_inicio">
                <button type="submit" id="searchButton">Filtrar</button>
            </form><br>

            <table>
                <tr>
                    <th>Nome do Cliente</th>
                    <th>Nome do Produto</th>
                    <th>Quantidade</th>
                    <th>Status do Produto</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                </tr>

                <?php
                include_once ('../conexao.php');

                // Defina a query para selecionar todas as vendas
                $sql = "SELECT Paciente.nome_paciente, Produto.nome_produto, Produto.quantidade, ProdutoPaciente.status, ProdutoPaciente.data_inicio, ProdutoPaciente.data_fim FROM ProdutoPaciente
                    INNER JOIN Produto ON ProdutoPaciente.id_produto = Produto.id_produto
                    INNER JOIN Paciente ON ProdutoPaciente.id_paciente = Paciente.id_paciente";

                // Verifique se um filtro foi aplicado
                if (isset($_GET['data_inicio'])) {
                    $data_inicio = $_GET['data_inicio'];

                    // Adicione a condição do filtro à query
                    $sql .= " WHERE ProdutoPaciente.data_inicio >= '$data_inicio'";
                }

                $result = mysqli_query($conexao, $sql);

                if ($result->num_rows > 0) {
                    // Exibe os dados em cada linha da tabela
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["nome_paciente"] . "</td>
                            <td>" . $row["nome_produto"] . "</td>
                            <td>" . $row["quantidade"] . "</td>
                            <td>" . $row["status"] . "</td>
                            <td>" . $row["data_inicio"] . "</td>
                            <td>" . $row["data_fim"] . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Nenhum registro encontrado.</td></tr>";
                }
                ?>
            </table>
        </div>
    </main>
</body>

</html>