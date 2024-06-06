<?php
$id_venda = $_POST['id_venda'];
$data_venda = $_POST['data_venda'];
$total_venda = $_POST['total_venda'];
$nome_produto = $_POST['nome_produto'];
$descricao_produto = $_POST['descricao_produto'];
$preco = $_POST['preco'];
$nome_paciente = $_POST['nome_paciente'];
$cpf = $_POST['cpf'];
$rg = $_POST['RG'];
$email = $_POST['email'];
$nascimento = $_POST['nascimento'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$cep = $_POST['cep'];
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nota Fiscal</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Nota Fiscal</h1>
    <h2>Dados do Cliente</h2>
    <table>
        <tr>
            <th>Nome</th>
            <td><?php echo $nome_paciente; ?></td>
        </tr>
        <tr>
            <th>CPF</th>
            <td><?php echo $cpf; ?></td>
        </tr>
        <tr>
            <th>RG</th>
            <td><?php echo $rg; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Data de Nascimento</th>
            <td><?php echo $nascimento; ?></td>
        </tr>
        <tr>
            <th>Telefone</th>
            <td><?php echo $telefone; ?></td>
        </tr>
        <tr>
            <th>Endereço</th>
            <td><?php echo $endereco; ?></td>
        </tr>
        <tr>
            <th>Bairro</th>
            <td><?php echo $bairro; ?></td>
        </tr>
        <tr>
            <th>Cidade</th>
            <td><?php echo $cidade; ?></td>
        </tr>
        <tr>
            <th>CEP</th>
            <td><?php echo $cep; ?></td>
        </tr>
    </table>

    <h2>Dados da Venda</h2>
    <table>
        <tr>
            <th>ID da Venda</th>
            <td><?php echo $id_venda; ?></td>
        </tr>
        <tr>
            <th>Data da Venda</th>
            <td><?php echo $data_venda; ?></td>
        </tr>
        <tr>
            <th>Total da Venda</th>
            <td><?php echo $preco; ?></td>
        </tr>
    </table>

    <h2>Dados do Produto</h2>
    <table>
        <tr>
            <th>Nome do Produto</th>
            <td><?php echo $nome_produto; ?></td>
        </tr>
        <tr>
            <th>Descrição do Produto</th>
            <td><?php echo $descricao_produto; ?></td>
        </tr>
        <tr>
            <th>Preço</th>
            <td><?php echo $preco; ?></td>
        </tr>
    </table>

</body>
</html>
