<h1>VOCÊ ESTÁ NA LISTA DE CARROS</h1>

<a href="index.php?menu=adicionarCarro">
    <button type="button">ADICIONAR CARRO</button>
</a>

<form action="index.php?menu=lista"method="post">
    <input type="text" name="pesquisa" id="pesquisa">
    <button type="submit">PESQUISAR</button>
</form>

<table class="table">
    <tr>
        <th>Modelo</th>
        <th>Valor</th>
        <th>Ano</th>
        <th>Cor</th>
        <th>Marca</th>
    </tr>
<?php
    if(isset($_POST['pesquisa'])){
        $termoPesquisado = $_POST['pesquisa'];
    }else{
        $termoPesquisado = "";
    }

    $sql = "SELECT idCarro,
    upper(modeloCarro) AS modeloCarro,
    upper(marcaCarro) AS marcaCarro,
    upper(valorCarro) AS valorCarro,
    DATE_FORMAT(anoCarro, '%d/%m/%y') AS anoCarro,
    upper(corCarro) AS corCarro
    FROM carro WHERE 
    idCarro = '$termoPesquisado' OR
    modeloCarro LIKE '%$termoPesquisado%'
    ORDER BY modeloCarro ASC
    ";

    // pedido
    $query = mysqli_query($conexao,$sql) or die("Erro na requisição!".mysqli_error($conexao));

 
    // fetch_asso = vai acessar um query, e contar os resultados
    while($dados = mysqli_fetch_assoc($query)){
?>
        <tr>
            <td><?=$dados['modeloCarro']?></td>
            <td><?=$dados['valorCarro']?></td>
            <td><?=$dados['anoCarro']?></td>
            <td><?=$dados['corCarro']?></td>
            <td><?=$dados['marcaCarro']?></td>
            <td><a href="index.php?menu=editarCarro&idCarro=<?=$dados['idCarro']?>" class="btn btn-primary">EDITAR</a></td>
            <td><a href="index.php?menu=deletarCarro&idCarro=<?=$dados['idCarro']?>" class="btn btn-danger">DELETAR</a></td>
        </tr>
    <?php
        }
    ?>
</table>

