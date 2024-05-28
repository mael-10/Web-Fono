<?php
      include_once('../conexao.php');

      if (isset($_POST['query'])) {
          $query = $_POST['query'];
          $sql = "SELECT atendimento.data, atendimento.descricao, atendimento.hora, paciente.nome_paciente FROM atendimento 
          INNER JOIN paciente ON atendimento.id_paciente = paciente.id_paciente WHERE atendimento.data LIKE '%$query%' OR paciente.nome_paciente LIKE '%$query%'";

                $resultado = mysqli_query($conexao, $sql);

                echo "<tr>";
                echo "<th>Nome: </th>";
                echo "<th>Data </th>";
                echo "<th>Hora </th>";
                echo "<th>Descricao </th>";
                echo "</tr>";

                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<table>";
                        echo "<tr>";
                        echo "<td>". $row['nome_paciente'] ."</td>";
                        echo "<td>". $row['data'] ."</td>";
                        echo "<td>". $row['hora'] ."</td>";
                        echo "<td>". $row['descricao'] ."</td>";
                        echo "</tr>";
                        echo "</div>";
                        echo "</table>";
                    }

                } else {
                    echo "<p>Nenhum produto encontrado.</p>";
                }

            }
            ?>