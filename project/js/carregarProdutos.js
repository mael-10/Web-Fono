async function carregarProdutos(valor){
    if(valor.length >= 2){
        // console.log(valor)

        const dados = await fetch('listar_nomes.php?nome_paciente=' + valor);

        const resposta =  await dados.json();
    }
}