<?php

// Código PHP para gerar o PDF
require_once('tcpdf.php');

include_once("../../conexao.php"); 

$codigo = $_POST['id'];

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

// Iniciar o objeto TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

// Adicionar uma página ao PDF
$pdf->AddPage();

// Cabeçalho do PDF
$html = '<h1>Nota Fiscal</h1>';

$html .= '<hr>'; 
$html .= '<h2>Dados do Paciente</h2>';
$html .= '<table>';
$html .= '<tr><th>Nome</th><td>' . $nome_paciente . '</td></tr>';
$html .= '<tr><th>CPF</th><td>' . $cpf . '</td></tr>';
$html .= '<tr><th>RG</th><td>' . $rg . '</td></tr>';
$html .= '<tr><th>Email</th><td>' . $email . '</td></tr>';
$html .= '<tr><th>Data de Nascimento</th><td>' . $nascimento . '</td></tr>';
$html .= '<tr><th>Telefone</th><td>' . $telefone . '</td></tr>';
$html .= '<tr><th>Endereço</th><td>' . $endereco . '</td></tr>';
$html .= '<tr><th>Bairro</th><td>' . $bairro . '</td></tr>';
$html .= '<tr><th>Cidade</th><td>' . $cidade . '</td></tr>';
$html .= '<tr><th>CEP</th><td>' . $cep . '</td></tr>';
$html .= '</table>';

$html .= '<h2>Dados da Venda</h2>';
$html .= '<table>';
$html .= '<tr><th>ID da Venda</th><td>' . $id_venda . '</td></tr>';
$html .= '<tr><th>Data da Venda</th><td>' . $data_venda . '</td></tr>';
$html .= '<tr><th>Total da Venda</th><td>' . $total_venda . '</td></tr>';
$html .= '</table>';

$html .= '<h2>Dados do Produto</h2>';
$html .= '<table>';
$html .= '<tr><th>Nome do Produto</th><td>' . $nome_produto . '</td></tr>';
$html .= '<tr><th>Descrição do Produto</th><td>' . $descricao_produto . '</td></tr>';
$html .= '<tr><th>Preço</th><td>' . $preco . '</td></tr>';
$html .= '</table>';

// Escrever o conteúdo HTML no PDF
$pdf->writeHTML($html, true, false, true, false, '');

//Limpa os dados anteriores
ob_end_clean();

// Saída do PDF para o navegador
$pdf->Output('nota_fiscal.pdf', 'I');

// Fechar a conexão com o banco de dados
mysqli_close($conexao);

// Termina o script aqui para evitar qualquer saída adicional
exit;
?>
