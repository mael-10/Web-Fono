<?php
include_once('../conexao.php');

$query = isset($_POST['query']) ? $_POST['query'] : '';

if (trim($query) == '') {
    $sql = "SELECT * FROM paciente";
} else {
    $sql = "SELECT * FROM paciente WHERE nome_paciente LIKE '%$query%'";
}

$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table>";
    echo "<tr>
          <th>Nome Completo</th>
          <th>CPF</th>
          <th>RG</th>
          <th>Email</th>
          <th>Data de nascimento</th>
          <th>Telefone</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>Cep</th>
        </tr>";
    while ($row = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>" . $row['nome_paciente'] . "</td>";
        echo "<td>" . $row['cpf'] . "</td>";
        echo "<td>" . $row['RG'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['nascimento'] . "</td>";
        echo "<td>" . $row['telefone'] . "</td>";
        echo "<td>" . $row['endereco'] . "</td>";
        echo "<td>" . $row['bairro'] . "</td>";
        echo "<td>" . $row['cidade'] . "</td>";
        echo "<td>" . $row['cep'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Não há registros na tabela.";
}

// Fecha a conexão
mysqli_close($conexao);
?>
