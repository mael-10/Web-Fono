<?php

    include('../../php/login/protect.php');
    include_once('../../php/conexao.php');

    // Fetch today's date
    $today = date('Y-m-d');

    // Query to fetch today's appointments
    $sql = "SELECT Atendimento.descricao, Atendimento.hora, Paciente.nome_paciente 
            FROM Atendimento 
            JOIN Paciente ON Atendimento.id_paciente = Paciente.id_paciente 
            WHERE Atendimento.data = '$today'";

    $result = mysqli_query($conexao, $sql);

    $tasks = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tasks[] = $row;
        }
    }

    // Query to fetch top sold products
    $sql_vendas = "SELECT Produto.nome_produto, COUNT(*) as total_vendas 
    FROM Venda 
    JOIN Produto ON Venda.id_produto = Produto.id_produto 
    GROUP BY Produto.nome_produto 
    ORDER BY total_vendas DESC 
    LIMIT 5";

    $result_vendas = mysqli_query($conexao, $sql_vendas);

    $product_sales = [];
    if (mysqli_num_rows($result_vendas) > 0) {
        while ($row = mysqli_fetch_assoc($result_vendas)) {
            $product_sales[] = $row;
        }
    }

    $mes_atual = date('Y-m');
    $sql_devolucoes = "SELECT COUNT(*) AS total_devolucoes FROM ProdutoPaciente WHERE status = 'Devolvido' AND MONTH(data_fim) = MONTH(NOW())";
    $result_devolucoes = mysqli_query($conexao, $sql_devolucoes);
    $total_devolucoes = 0;
    if ($result_devolucoes && mysqli_num_rows($result_devolucoes) > 0) {
        $row = mysqli_fetch_assoc($result_devolucoes);
        $total_devolucoes = $row['total_devolucoes'];
    }


// Calcular a quantidade de consultas marcadas no mês atual
$sql_consultas_mes = "SELECT COUNT(*) AS total_consultas FROM Atendimento WHERE MONTH(data) = MONTH(NOW())";
$result_consultas_mes = mysqli_query($conexao, $sql_consultas_mes);
$total_consultas_mes = 0;
if ($result_consultas_mes && mysqli_num_rows($result_consultas_mes) > 0) {
    $row = mysqli_fetch_assoc($result_consultas_mes);
    $total_consultas_mes = $row['total_consultas'];
}

// Calcular a quantidade de itens vendidos no mês atual
$sql_vendas_mes = "SELECT COUNT(*) AS total_vendas FROM Venda WHERE MONTH(data) = MONTH(NOW())";
$result_vendas_mes = mysqli_query($conexao, $sql_vendas_mes);
$total_vendas_mes = 0;
if ($result_vendas_mes && mysqli_num_rows($result_vendas_mes) > 0) {
    $row = mysqli_fetch_assoc($result_vendas_mes);
    $total_vendas_mes = $row['total_vendas'];
}
    // Close the connection
    mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="../../images/icon-logo.ico"/>
    <link rel="stylesheet" href="../../../src/output.css"/>
    <link rel="stylesheet" href="../../css/agenda.css">
    <title>Agenda</title>
    <style>
        .card-body-scrollable {
            height: 300px; /* Defina a altura desejada */
            overflow: auto;
        }
        .content {
            margin-left: 65px;
            transition: margin-left 0.2s;
        }
        nav.expandir + .content {
            margin-left: 300px;
        }

        .count-box-container {
            display: flex;
            justify-content: center; /* Centralizar os quadrados horizontalmente */
            align-items: center; /* Centralizar os quadrados verticalmente */
            margin-bottom: 50px; /* Espaçamento inferior */
        }

        .count-box {
            background-color: #0c5f55;
            color: #ffffff;
            padding: 20px; /* Espaçamento interno maior */
            height: 180px; /* Altura dos quadrados */
            width: 180px; /* Largura dos quadrados */
            border-radius: 10px;
            margin-right: 40px;
            text-align: center;
            display: flex;
            flex-direction: column; /* Os números serão centralizados verticalmente */
            justify-content: center;
            align-items: center;
        }
        
        .count-number {
            font-size: 36px; /* Tamanho da fonte dos números */
            font-weight: bold;
            margin-top: 10px; /* Espaçamento superior */
        }
        .tasks-container {
            display: flex;
            justify-content: center;
            margin-bottom: 50px;
        }

        .task-list {
            width: 80%; /* Defina a largura desejada */
            max-width: 600px; /* Defina a largura máxima */
        }

    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Produto', 'Total de Vendas'],
            <?php foreach ($product_sales as $sale): ?>
                ['<?php echo $sale['nome_produto']; ?>', <?php echo $sale['total_vendas']; ?>],
            <?php endforeach; ?>
        ]);

        var options = {
            title: 'Produtos Mais Vendidos',
            pieHole: 0.4
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
</head>
<body class="flex h-screen bg-white text-black dark:bg-fundo">
        <!-- Navbar -->
        
    <nav class="fixed left-0 top-0 h-full w-16 bg-fundo p-4 duration-300 dark:bg-gray-800 dark:text-white" id="nav-lte">
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
                <a href="../estoque/estoque.html" class="flex items-center">
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
                <a href="#" class="flex items-center">
                    <span class="icon">
                    <i class="fa-solid fa-user" style="color: #ffffff;"></i>
                    </span>
                    <span class="txt-link ml-5 overflow-hidden text-white"> <?php echo $_SESSION['usuario']; ?>.</span>
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
    <main class="content flex-1" id="cd-paciente">
        <div class="container mx-auto mt-6">
            <!-- Quadrados de contagem -->
            <div class="count-box-container">
                <div class="count-box">
                    <p class="font-semibold mb-2">Produtos Devolvidos no Mês:</p>
                    <p class="count-number"><?php echo $total_devolucoes; ?></p>
                </div>
                <div class="count-box">
                    <p class="font-semibold mb-2">Itens Vendidos no Mês:</p>
                    <p class="count-number"><?php echo $total_vendas_mes; ?></p>
                </div>
                <div class="count-box">
                    <p class="font-semibold mb-2">Consultas Marcadas no Mês:</p>
                    <p class="count-number"><?php echo $total_consultas_mes; ?></p>
                </div>
            </div>
            <!-- Restante do conteúdo -->
        </div>
        <div class="flex flex-wrap justify-center">
    <!-- Tarefas do dia -->
    <div class="w-full md:w-1/2 p-2 center-content">
        <div class="bg-white shadow-lg pb-2 rounded-lg">
            <div class="bg-blue-600 text-white p-4 rounded-md">
                <h2 class="text-lg font-bold"><?php echo date('d F, Y'); ?></h2>
            </div>
            <div class="card-body-scrollable p-4">
                <p class="font-semibold mb-4">Consultas do dia</p>
                <?php if (!empty($tasks)): ?>
                    <?php foreach ($tasks as $task): ?>
                        <div class="task-item mb-4 pl-4 border-l-4 border-blue-600">
                            <p class="font-bold"><?php echo date('h:i A', strtotime($task['hora'])); ?></p>
                            <p class="font-bold"><?php echo htmlspecialchars($task['nome_paciente']); ?></p>
                            <p><?php echo htmlspecialchars($task['descricao']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Sem compromissos para hoje.</p>
                <?php endif; ?>
            </div>
            <div class="flex justify-center">
                <button class="w-[90%] bg-blue-600 text-white py-1 mt-4 rounded-none">CARREGUE MAIS</button>
            </div>
        </div>
    </div>
    <!-- Gráfico -->
    <div class="w-full md:w-1/2 p-2 center-content">
        <div class="bg-white shadow-lg pb-2 rounded-lg">
            <div id="piechart" class="mx-auto" style="width: 100%; height: 409px;"></div>
        </div>
    </div>
</div>
    <script src="../../javascript/menu.js"></script> 
</body>
</html>
