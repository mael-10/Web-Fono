<?php
include_once('../conexao.php');

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = "SELECT * FROM produto WHERE nome_produto LIKE '%$query%'";
    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            echo "<div class='options'>";
            echo "    <div class='content-image img-classe'> ";
            echo "       <img src='" . $row['foto_produto'] . "' alt=''>";
            echo "    </div>";
            echo "    <h1 class='titulo-options'>Nome: " . $row['nome_produto'] . "</h1>";
            echo "    <p>Preço: R$" . $row['preco'] . "</p>";
            echo "    <p>Quantidade: " . $row['quantidade'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhum produto encontrado.</p>";
    }
}
?>
