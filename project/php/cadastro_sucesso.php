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
    <link rel="stylesheet" href="css/atendimento.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Reddit+Sans:ital,wght@0,200..900;1,200..900&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" type="image/png" href="../../images/icon-logo.ico">
    <link rel="stylesheet" href="../../src/output.css" />
    <link rel="stylesheet" href="../css/cadastro_sucesso.css"/>
    <title>Cadastrar Paciente</title>
  </head>
  <body>
    <main class=" flex justify-center h-screen" id="cd-paciente">
      <div class="container flex items-center flex-col">
        <div class="mb-32">
            <?php
                echo '<h1 class="text-5xl text-greenF">CADASTRO REALIZADO COM SUCESSO!</h1>';
                echo '<div class="mt-20 text-center">';
                echo  '<a href="../../html/paciente/home_paciente.html"><button class="text-white bg-buttonGreen hover:bg-buttonHover">Voltar ao Início</button></a>';
                echo '</div>'; 
            ?>
        </div>
      </div>
    </main>
  </body>
</html>
