<?php
    include_once('../conexao.php');

    $nome = filter_input(INPUT_GET, "nome", FILTER_DEFAULT);
    

    if(!empty($nome)){

        $pesqu_produtos = "%" .$nome ."%";
        
        $query_nomes = "SELECT id_paciente, nome_paciente from paciente where nome_paciente LIKE :nome LIMIT 20";
        $resultado = $conexao->prepare($query_nomes);
        $resultado->bind_param(':nome', $pesqu_produtos);
        $resultado->execute();

        if(($resultado) and ($resultado->rowCount())){
            $retorna = ['status' => true, 'msg' => "Produto encontrado!"];
        }else{
            $retorna = ['status' => false, 'msg' => "Erro: nenhum nome encontrado!!"];
        }
    }
    echo json_encode($retorna);
?>