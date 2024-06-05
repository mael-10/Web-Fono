<?php
include_once("../conexao.php");

if (isset($_POST['search_query'])) {
    $searchQuery = $_POST['search_query'];
    $sql = "SELECT paciente.nome_paciente, atendimento.descricao FROM paciente inner join atendimento ON paciente.id_paciente = atendimento.id_paciente WHERE nome_paciente LIKE '%$searchQuery%' and descricao = 'Retorno'";
    $result = mysqli_query($conexao, $sql);

    $clientes = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $clientes[] = $row;
        }
    }

    echo json_encode($clientes);
}
?>
