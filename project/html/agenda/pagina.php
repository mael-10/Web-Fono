<?php
    include('../../php/login/protect.php');
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
    </style>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Work',     11],
        ['Eat',      2],
        ['Commute',  2],
        ['Watch TV', 2],
        ['Sleep',    7]
        ]);

        var options = {
        title: 'My Daily Activities'
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
            <div class="flex flex-wrap">
                <!-- Task Section -->
                <div class="w-full md:w-1/2 p-2">
                    <div class="bg-white shadow-lg pb-2 rounded-lg">
                        <div class="bg-blue-600 text-white p-4 rounded-md">
                            <h2 class="text-lg font-bold">26 April, 2018</h2>
                        </div>
                        <div class="card-body-scrollable p-4">
                            <p class="font-semibold mb-4">Tasks for John Doe</p>
                            <div class="task-item mb-4 pl-4 border-l-4 border-blue-600">
                                <p>Meeting about plan for Admin Template 2018</p>
                                <p class="font-bold">10:00 AM</p>
                            </div>
                            <div class="task-item mb-4 pl-4 border-l-4 border-orange-500">
                                <p>Create new task for Dashboard</p>
                                <p class="font-bold">11:00 AM</p>
                            </div>
                            <div class="task-item mb-4 pl-4 border-l-4 border-blue-500">
                                <p>Meeting about plan for Admin Template 2018</p>
                                <p class="font-bold">02:00 PM</p>
                            </div>
                            <div class="task-item mb-4 pl-4 border-l-4 border-green-500">
                                <p>Create new task for Dashboard</p>
                                <p class="font-bold">03:30 PM</p>
                            </div>
                            <div class="task-item mb-4 pl-4 border-l-4 border-green-500">
                                <p>Create new task for Dashboard</p>
                                <p class="font-bold">03:30 PM</p>
                            </div>
                            <div class="task-item mb-4 pl-4 border-l-4 border-green-500">
                                <p>Create new task for Dashboard</p>
                                <p class="font-bold">03:30 PM</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button class="w-[90%] bg-blue-600 text-white py-1 mt-4 rounded-none">LOAD MORE</button>
                        </div>
                    </div>
                </div>

                <!-- Message Section -->
                <div class="md:w-1/2 p-2">
                    <div class="bg-white shadow-lg rounded-lg pb-2">
                        <div class="bg-blue-600 text-white p-4 rounded-md">
                            <h2 class="text-lg font-bold">New Messages</h2>
                        </div>
                        <div class="card-body-scrollable p-4">
                            <p class="font-semibold mb-4">You have 2 new messages</p>
                            <div class="message-item mb-4 pb-4 border-b border-gray-300">
                                <p><strong>John Smith</strong> <span class="text-gray-500 text-sm">12 Min ago</span></p>
                                <p>Have sent a photo</p>
                            </div>
                            <div class="message-item mb-4 pb-4 border-b border-gray-300">
                                <p><strong>Nicholas Martinez</strong> <span class="text-gray-500 text-sm">11:00 PM</span></p>
                                <p>You are now connected on message</p>
                            </div>
                            <div class="message-item mb-4 pb-4 border-b border-gray-300">
                                <p><strong>Michelle Sims</strong> <span class="text-gray-500 text-sm">Yesterday</span></p>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                            <div class="message-item mb-4 pb-4 border-b border-gray-300">
                                <p><strong>Michelle Sims</strong></p>
                                <p>Lorem ipsum dolor sit amet</p>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button class="w-[90%] bg-blue-600 text-white py-1 mt-4 rounded-none">LOAD MORE</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Linha de codigo do gráfico -->
        <div class="text-center">
            <div id="piechart" class="mx-auto" style="width: 1000px; height: 750px;"></div>
        </div>
    </main>

    <script src="../../javascript/menu.js"></script> 
</body>
</html>