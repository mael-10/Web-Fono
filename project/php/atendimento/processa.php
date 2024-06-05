<?php
include_once("../conexao.php");

if (isset($_POST['search_query'])) {
    $searchQuery = $_POST['search_query'];
    $sql = "SELECT nome_paciente FROM paciente WHERE nome_paciente LIKE '%$searchQuery%'";
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
